<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Skill;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\array_only;
use Illuminate\Support\Arr;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $skills = Skill::all();
        $type = $request->input('type');
        $value = $request->input('value');
        $selectVal = $request->input('skill_se');
        if ($type) {
            if ($type == 'phone') {
                $students = DB::table('students')
                    ->where(function ($query) use ($value) {
                        $query->orWhereRaw("REPLACE(phone, '-', '') like '%" . str_replace('-', '', $value) . "%'");
                    })
                    ->whereNull('deleted_at')->paginate(5)->appends(['type' => $type, 'value' => $value]);
                if ($students->total() < 1) {
                     return back()->with('thongbao2', '電話番号の値「'.$value. ' 」がデータ内に見つかりません!');
                } else {
                    return view('students.index', compact('students', 'type', 'skills','selectVal'))->with('i', ($students->currentPage() - 1) * 5);
                }
                
            } else if ($type == 'skill_se') {
            function hasSpecialCharacters($value)
                {
                    $pattern = '/[^\w\s]/'; // Biểu thức chính quy kiểm tra các kí tự đặc biệt
                    return preg_match($pattern, $value);
                }
                if (!empty($selectVal)) {
                    $students = Student::where(function ($query) use ($selectVal) {
                        
                        foreach ($selectVal as $val) {
                            if (hasSpecialCharacters($val)) {
                                $query->where('skill_se','like','%'.$val.'%');
                            } else {
                                $query->whereRaw("REPLACE(skill_se, '-', '') REGEXP '[[:<:]]" . $val . "(,|$)'");
                            }
                        }
                    })->paginate(5)->appends(['type' => $type, 'value' => $selectVal]);
                    if ($students->isEmpty()) {
                        return back()->withErrors('プログラミングスキルの値「」がデータ内に見つかりません!');
                    } else {
                        return view('students/index', compact('students', 'selectVal', 'skills'))->with('i', (request()->input('page', 1) - 1) * 5)
                            ->with('a', (request()->input('page', 1) - 1) * 5);
                    }
                } else {
                    $students = Student::paginate(5);
                    return view('students/index', compact('students', 'skills', 'selectVal'))->with('i', (request()->input('page', 1) - 1) * 5);
                }
            
            // if ($type == 'skill_se') {
            //     if (!empty($selectVal)) {
            //         $students = DB::table('students')
            //             ->where(function ($query) use ($selectVal) {
            //                 foreach ($selectVal as $val) {
            //                     $query->whereRaw("CONCAT(',', skill_se, ',') REGEXP '[^[:alnum:]]".$val."[^[:alnum:]]'");
            //                 }
            //             })->whereNull('deleted_at')->paginate(5)->appends(['type' => $type, 'value' => $selectVal]);
            //         if ($students->isEmpty()) {
            //             return back()->with('thongbao2', 'プログラミングスキルの値「'.$value.'」がデータ内に見つかりません!');
            //         } else {
            //             // var_dump($students);
            //             return view('students.index', compact('students', 'selectVal', 'skills'))->with('i', (request()->input('page', 1) - 1) * 5);
            //         }
            //     } else {
            //         $students = Student::paginate(5);
            //         return view('students.index', compact('students', 'skills', 'selectVal'))->with('i', (request()->input('page', 1) - 1) * 5);
            //     }
            } else if ($type == 'name') {
                $students = Student::
                    where('name', 'like', '%' . $value . '%')->orWhere('name_kana', 'like', '%' . $value . '%')->paginate(5)->appends(['type' => $type, 'value' => $value]);
                if ($students->isEmpty()) {
                    return back()->with('thongbao2', '名前の値「'.$value. ' 」がデータ内に見つかりません!');
                } else {
                    return view('students.index', compact('students', 'selectVal', 'skills'))->with('i', (request()->input('page', 1) - 1) * 5);
                }
            }else {
                $students = DB::table('students')->orWhere($type, 'like', '%' . $value . '%')->whereNull('deleted_at')->paginate(5)->appends(['type' => $type, 'value' => $value]);
                if ($students->isEmpty()) {
                    return back()->with('thongbao2', '年齢の値「'.$value. ' 」がデータ内に見つかりません!');
                } else {
                    return view('students.index', compact('students', 'selectVal', 'skills'))->with('i', (request()->input('page', 1) - 1) * 5);
                }
            }
        } else {
            $students = Student::paginate(5);
            return view('students.index', compact('students', 'skills', 'selectVal'))->with('i', (session()->get('student_page', 1) - 1) * 5);
        }
    }

    public function create()
    {
        $skills = Skill::all();
        return view('students.create', compact(['skills']));
    }

    public function store(StudentRequest $studentRequest)
    {
        $data = $studentRequest->all();

        $name_kana = str_replace(' ', '　', $studentRequest->input('name_kana'));

        if (is_null($studentRequest['skill_se'])) {

            $apply_department = $studentRequest->input('apply_department');
            if (empty($apply_department)) {
                $apply_department = '勤務地マスタ';
            }
            $age = $studentRequest->input('age');
            if (empty($age)) {
                $age = 0;
            }
            $data['age'] = $age;
            $data['apply_department'] = $apply_department;
            $data['name_kana'] = $name_kana;

            Student::create($data);
            return redirect()->route('student.index')->with('thongbao', '追加しました!');
        } else {

            $skill_se = $studentRequest->input('skill_se');
            $skill_seStr = implode(',', $skill_se);
            $data['skill_se'] = $skill_seStr;
            $graduate_4 = $studentRequest->has('graduate_4') ? 1 : 0;
            $graduate_2 = $studentRequest->has('graduate_2') ? 1 : 0;
            $data['graduate_4'] = $graduate_4;
            $data['graduate_2'] = $graduate_2;
            $data['name_kana'] = $name_kana;

            Student::create($data);
            return redirect()->route('student.index')->with('thongbao', '追加しました!');
        };
    }

    public function show($id)
    {
        $students = Student::find($id);
        $studentArray = $students->toArray();
        $arraySkills = Arr::only($studentArray,['skill_jlpt','skill_hearing','skill_speaking','skill_reading',]);
        // $arraySkills = [$students['skill_jlpt'],$students['skill_hearing'],$students['skill_speaking'],$students['skill_reading']];
        return view('students.view', compact('students', 'arraySkills'));
    }
    public function edit(Request $request, String $id)
    {
        $students = Student::find($id);
        $skills = Skill::all();

        $string = $students->skill_se;
        $arraySkill = explode(',', $string);
        $students['skill_se'] = $arraySkill;
        // dd($students);
        return view('students.edit', compact('students', 'skills', 'arraySkill'));
    }

    public function update(StudentRequest $request, $id)
    {
        $data = $request->all();
        $name_kana = str_replace(' ', '　', $request->input('name_kana'));

        if (is_null($request['skill_se'])) {
            $phoneSearch = $request->input('phone');
            $phoneSearch2 = str_replace('-', '', $phoneSearch);
            $data['phoneSearch'] = $phoneSearch2;
            $data['name_kana'] = $name_kana;

            $students = Student::find($id);
            $students->update($data);

            return redirect()->route('student.index')->with('thongbao', 'アップデートしました!');
        } else {
            $students = Student::find($id);

            $skill_se = $request->input('skill_se');
            $skill_seStr = implode(',', $skill_se);
            $graduate_4 = $request->has('graduate_4') ? 1 : 0;
            $graduate_2 = $request->has('graduate_2') ? 1 : 0;
            $data['skill_se'] = $skill_seStr;
            $data['graduate_4'] = $graduate_4;
            $data['graduate_2'] = $graduate_2;
            $data['name_kana'] = $name_kana;

            $students->update($data);
            return redirect()->route('student.index')->with('thongbao', 'アップデートしました!');
        };
    }

    public function destroy($id)
    {
        // Lưu trang hiện tại vào session
        session()->put('student_page', request()->input('page', 1));

        $students = Student::find($id);
        $students->delete();

        return back()->with('thongbao', '削除しました!');
    }

    public function restore()
    {
        $students = Student::withTrashed();
        $students->restore();
        return redirect()->route('student.index')->with('thongbao', '成功した回復!');
    }

    public function getSkills()
    {
        $skills = Skill::all();

        return response()->json($skills
    );
    }
    public function getData(Request $request)
    {
        $input = $request->input('value');
        $name = $request->input('name');
        return response()->json(
            [
                'inputValue' => $input,
                'name' => $name,
                'status' => 200
            ]
        );
    }
}
