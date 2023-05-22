<!-- index de tao cac chuc nang them sua xoa -->

@extends('layout')

@section('content')
    @php
        
    @endphp
    <div class="background">


        <div class="container">
            <style>
                .background {
                    width: 100%;
                    height: 100vh;
                    background: url('/images/background.jpg');
                    /* background-size: cover; */

                }
                .car{
                    /* background-color: red; */
                }
            </style>
            <div class="card">
                <div class="card-header" style="background-color:#40b8ea">
                    <div class="row ">
                        <div class="col-md-3 " tyle="display: flex; align-items: center; justify-content: center;">
                            {{-- <button type="button" class="bold-black btn btn-primary btn-lg width: 100% ;height: auto;"> --}}
                            <strong class="btn-h2">
                                <a href="{{ route('student.index') }}" class="btn"
                                    style="font-size: 1em;font-weight: bold">人材管理</a>
                                <i class="fa-solid fa-house-user"></i>
                            </strong>
                            {{-- </button> --}}
                            <style>
                                .bold-black {
                                    /* font-weight: bold; */
                                    /* color: rgb(205, 60, 60); */

                                }
                            </style>
                        </div>
                        <div class="col-md-7">
                            <div class="form-control" style="background-color:#dbedfb">
                                <form action="{{ route('student.index') }}" id="content" method="get">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <strong class="text-dark">type</strong><br>
                                            <select name="type" class="form-select" id="type">

                                                <option value="name" @if (old('type', session('inserttype')) == 'name') selected @endif>名前
                                                </option>

                                                <option value="age" @if (old('type', session('inserttype')) == 'age') selected @endif>年齢
                                                </option>

                                                <option value="email" @if (old('type', session('inserttype')) == 'email') selected @endif>メール
                                                </option>

                                                <option value="phone"@if (old('type', session('inserttype')) == 'phone') selected @endif>電話
                                                </option>

                                                <option value="skill_se" @if (old('type', session('inserttype')) == 'skill_se') selected @endif>
                                                    言語(SkillSE)
                                                </option>
                                            </select>
                                        </div>
                                        {{-- <div class="col-md-6">
                                        <div id="search-input">
                                            <label for="value" style="font-weight: bold">Value</label>
                                            <input class="form-control" type="text" name="value" id="value"
                                                placeholder="入力してください。">
                                        </div>
                                        <div id="search-select" style="display:none;">
                                            <label for="value" style="font-weight: bold">スキル</label>
                                            <div style="display: flex; align-items: center;">
                                                <select name="skill_se[]" id="skill_se" multiple>
                                                    @foreach ($skills as $skill)
                                                        <option value="{{ $skill->name }}"
                                                            {{ is_array($selectVal) && in_array($skill->name, $selectVal) ? 'selected' : '' }}>
                                                            {{ $skill->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <button type="button" id="destroy" class="delCtr btn btn-danger btn-sm">追加</button>
                                            </div>
                                            
                                        </div>
                                    </div> --}}
                                        <div class="col-md-6">
                                            <div id="search-input">
                                                <label for="value" style="font-weight: bold">Value</label>
                                                <input class="form-control" type="text" name="value" id="value"
                                                    placeholder="入力してください。" style="width: 100%;">
                                                <br>
                                            </div>

                                            <div id="search-select" style="display:none;">
                                                <label for="value" style="font-weight: bold">スキル</label>
                                                <div>
                                                    <select name="skill_se[]" id="skill_se" multiple style="width: 100%;">
                                                        @foreach ($skills as $skill)
                                                            <option value="{{ $skill->name }}"
                                                                {{ is_array($selectVal) && in_array($skill->name, $selectVal) ? 'selected' : '' }}>
                                                                {{ $skill->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <a href="{{ route('skill.create') }}"
                                                        class="btn btn-outline-secondary btn-sm">追加</a>
                                                    {{-- <button type="button" id="destroy" class="btn btn-outline-secondary btn-sm">追加</button> --}}
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="col-md-3">
                                            <strong></strong><br>
                                            <div style="align-items: center; justify-content: center;">
                                                <button type="submit" class="search btn btn-outline-warning "
                                                    id="search" style="" class=""><i
                                                        class="fa-solid fa-magnifying-glass"></i>
                                                    検索</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="">
                                <a href="{{ route('student.create') }}" class="btn btn-outline-primary float-end  ">追加</a>
                            </div>
                            {{-- <div class="col-md-6">
                            <a href="{{ route('STUDENT.restore') }}" class="btn btn-primary float-end">Restore</a>
                        </div> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="error">
                        @if (Session::has('thongbao'))
                            <div class="alert alert-success">
                                {{ Session::get('thongbao') }}
                            </div>
                        @endif
                        @if (Session::has('thongbao2'))
                            <div class="alert alert-danger">
                                {{ Session::get('thongbao2') }}
                            </div>
                        @endif
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>＃</th>
                                <th>名前（アルファベット、漢字とか））</th>
                                <th>氏名（カタカナ）</th>
                                <th>性別（男/女）</th>
                                <th>年齢</th>
                                <th>出身国</th>
                                <th>電話番号</th>
                                <th>メールアドレス</th>
                                <th>修正</th>

                            </tr>
                        </thead>
                        <tbody>
                            <!-- lay tu sv controller -->
                            @foreach ($students as $us)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $us->name }}</td>
                                    <td>{{ $us->name_kana }}</td>
                                    <td>
                                        @php
                                            if ($us->sex === 0) {
                                                echo '不明';
                                            } elseif ($us->sex === 1) {
                                                echo '男';
                                            } else {
                                                echo '女';
                                            }
                                        @endphp
                                    </td>
                                    <td>{{ $us->age }}</td>
                                    <td>{{ $us->country }}</td>
                                    <td>{{ $us->phone }}</td>
                                    <td>{{ $us->email }}</td>
                                    <td>
                                        <form action="{{ route('student.destroy', $us->id) }}" method="POST">
                                            <a href="{{ route('student.show', $us->id) }}"
                                                class="btn btn-outline-secondary">全て</a>
                                            <a href="{{ route('student.edit', $us->id) }}"
                                                class="btn btn-outline-success">修正</a>
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('削除しますか?');"
                                                class="btn btn-danger">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        new MultiSelectTag('skill_se');
    </script>

    {{-- <script>
        $(document).ready(function() {
            // Ẩn input skill_se_info ban đầu
            $('#skill_se_info').hide();

            // Thêm sự kiện change cho dropdown type
            $('#seachSkills').change(function() {
                // Nếu giá trị được chọn là skill_se, hiển thị input skill_se_info và ẩn input value
                if ($(this).val() === 'skill_se') {
                    $('#skill_se_info').show();
                    $('#searchInput').hide();
                }
                // Ngược lại, ẩn input skill_se_info và hiển thị input value
                else {
                    $('#skill_se_info').hide();
                    $('#searchInput').show();
                }
            });
            function a() {
                var typeVal = $('#typeVal').val();
                if (typeVal === 'skill_se') {
                    $('#skill_se_info').show();
                    $('#searchInput').hide();
                }
                // Ngược lại, ẩn input skill_se_info và hiển thị input value
                else {
                    $('#skill_se_info').hide();
                    $('#searchInput').show();
                }
            }
            a();
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            $('#value').on('input', function(e) {
                $('#error').hide();
            });

            $('#type').on('change', function() {
                $('#error').hide();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var arrType = []
            $('#type').change(function() {
                var selectedOption = $(this).val();
                sessionStorage.setItem("type_value", selectedOption);
                changeOptions();
            });

            function changeOptions() {
                var typeVal = sessionStorage.getItem("type_value");
                if (typeVal === 'skill_se') {
                    $('#search-input').hide();
                    $('#search-select').show();
                } else {
                    $('#search-select').hide();
                    $('#search-input').show();
                }
            };
            var ValueVal = sessionStorage.getItem("value_value");
            $("#value").val(ValueVal);
            changeOptions();
            $(document).on('click', '.addNewSt', function(e) {
                sessionStorage.clear();
            });
            $("#value").on("input", function() {
                sessionStorage.setItem("value_value", $(this).val());
            });
        });

        $(window).on("load", function() {
            var typeVal = sessionStorage.getItem("type_value");
            $('#type option[value="' + typeVal + '"]').prop('selected', true);
        });
    </script>
    <script>
        (document).ready(function() {
            $('#search').on('', function(e) {
                e.preventDefault(); // Ngăn chặn việc submit form mặc định

                // Xử lý tìm kiếm dữ liệu tại đây

                // Giữ con trỏ chuột trong ô input[type="text"]
            });
        });
        $(window).on("load", function() {
            $('#value').focus();
        });
    </script>
