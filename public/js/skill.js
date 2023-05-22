// skill_seマスタ

$(document).ready(function() {
    var arrSkill = $('#skill_se option').map(function() {
        return $(this).val();

    }).get()

    function reloadOptions() {
        location.reload();
    }
    // console.log(arrSkill);
    $(document).on('click', '.addSkill', function(e) {
        e.preventDefault();
        $('#addSkill').html("");
        $('.addSkill').hide();
        $('#addSkill').append(
            '<br><input type="text" name="newSkill" id="newSkill" class="form-control" autocomplete="off"><br><button type="button" class="caclSkill btn btn-dark">キャンセル</button><button type="button" class="addNewSkill btn btn-success">Add</button>'
        );
    });
    $(document).on('click', '.caclSkill', function(e) {
        e.preventDefault();
        $('#addSkill').empty();
        $('.addSkill').show();
    });
    //add skill_se
    $(document).on('click', '.addNewSkill', function(e) {
        e.preventDefault();
        var skill = $('#newSkill').val();
        // console.log(skill);
        console.log(arrSkill.includes(skill));
        var newSkill = {
            'newSkill': skill,
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if (skill === '') {
            $('#addSkill').empty();
            $('#skill_mess').html("");
            $('#skill_mess').append(
                '<div class="alert alert-danger" id="myMessage">エーラです!</div>'
            );
            setTimeout(function() {
                $('#myMessage').hide();
            }, 2000);
            $('.addSkill').show();
        } else if (arrSkill.includes(skill)) {
            $('#addSkill').empty();
            $('#skill_mess').html("");
            $('#skill_mess').append(
                '<div class="alert alert-danger" id="myMessage">エーラです!データが存在されています!</div>'
            );
            setTimeout(function() {
                $('#myMessage').hide();
            }, 2000);
            $('.addSkill').show();
        } else {
            $.ajax({
                type: "POST",
                url: "/newSkill",
                data: newSkill,
                dataType: "json",
                success: function(response) {
                    reloadOptions();
                    $('#skill_mess').html("");
                    $('#skill_mess').append(
                        '<div class="alert alert-success" id="myMessage">完成!</div>'
                    );
                    setTimeout(function() {
                        $('#myMessage').hide();
                    }, 2000);
                    $('#addSkill').empty();
                    reloadOptions();
                    var skill_seVal = JSON.parse(sessionStorage.getItem(
                        'skill_se_value'));
                    if (skill_seVal) {
                        // Đặt các giá trị đã lưu trước đó vào select
                        $('#skill_se').val(skill_seVal);
                    }
                    $('.addSkill').show();
                }
            });
        }

    });
    //delete skill_se
    $(document).on('click', '.delSkill', function(e) {
        e.preventDefault();

        function confirmDelete() {
            var result = window.confirm('削除してもよろしいですか？');
            return result;
        }
        var confirmDelete = confirmDelete();
        if (confirmDelete === true) {
            var skill = $('#skill_se').val();
            var delSkill = {
                'delSkill': skill,
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/delSkill",
                data: delSkill,
                dataType: "json",
                success: function(response) {
                    // console.log(response.apply);
                    reloadOptions();
                    $('#skill_mess').html("");
                    $('#skill_mess').append(
                        '<div class="alert alert-success" id="myMessage">削除しました!</div>'
                    );
                    setTimeout(function() {
                        $('#myMessage').hide();
                    }, 2000);
                    $('#addSkill').empty();
                    reloadOptions();
                }
            });
        }
    });
    $(document).on('click', '.reldSkill', function(e) {
        e.preventDefault();
        sessionStorage.removeItem("skill_se_value");
        reloadOptions();
    });
});
// end skill_seマスタ

// $(document).ready(function() {
//     // $('.btn-container').remove();
//     $(document).on('click', '.empty', function(e) {
//         e.preventDefault();
//         var value = $(this).val();
//         var skill = $('<div class="item-container"><input type="hidden" id="skill-val" value="' +
//             value + '"><div class="item-label" data-value="' + value +
//             '">' + value +
//             '</div><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="item-close-svg">' +
//             '<line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></div>'
//         );
//         var option = $('<option value="' + value + '" selected>' + value + '</option>');
//         $('.input-container').append(skill);
//         $('#skill_se').append(option);
//     });
//     $(document).on('click', '.item-close-svg', function(e) {
//         e.preventDefault();
//         var deletedElement = $(this).parent();
//         var deletedValue = deletedElement.text().trim();
//         deletedElement.remove();
//         console.log('Deleted: ' + deletedValue);
//         $('#skill_se option[value="' + deletedValue + '"]').remove();
//         // $(this).closest('div').remove();
//     });
// });