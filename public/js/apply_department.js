// apply_departmentマスタ
$(document).ready(function() {
    var thisApl;
    var arrApl = [];

    function reloadOptions() {
        $.getJSON('/getApply', function(data) {
            var options = '';
            $.each(data, function(key, value) {
                options += '<option value="' + value.departments + '">' + value.departments +
                    '</option>';
                arrApl.push(value.departments);
            });
            var apply_departmentValue = sessionStorage.getItem('apply_department_value');
            var applyDpmt = $('#applyDpmt').val();
            $('#apply_department').html(options);
            $('#apply_department').val(apply_departmentValue);
            $('#apply_department option[value="' + applyDpmt + '"]').prop('selected', true);
            $('#apply_department option[value="' + thisApl + '"]').prop('selected', true);
        });
    }
    reloadOptions();
    // console.log(arrApl);
    $(document).on('click', '.addApl', function(e) {
        e.preventDefault();
        $('#addApl').html("");
        $('.addApl').hide();
        $('#addApl').append(
            '<br><input type="text" name="newApply" id="newApply" class="form-control" autocomplete="off"><br><button type="button" class="caclApl btn btn-dark">キャンセル</button><button type="button" class="addNewApl btn btn-success">Add</button>'
        );
    });
    $(document).on('click', '.caclApl', function(e) {
        e.preventDefault();
        $('#addApl').empty();
        $('.addApl').show();
    });
    //add apply_department
    $(document).on('click', '.addNewApl', function(e) {
        e.preventDefault();
        var apply = $('#newApply').val();
        var newApply = {
            'newApply': apply,
        }
        console.log(apply);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if (apply === '') {
            $('#addApl').empty();
            $('#Apl_mess').html("");
            $('#Apl_mess').append(
                '<div class="alert alert-danger" id="myMessage">エーラです!</div>'
            );
            setTimeout(function() {
                $('#myMessage').hide();
            }, 2000);
            $('.addApl').show();
        } else if (arrApl.includes(apply)) {
            $('#addApl').empty();
            $('#Apl_mess').html("");
            $('#Apl_mess').append(
                '<div class="alert alert-danger" id="myMessage">エーラです!データが存在されています!</div>'
            );
            setTimeout(function() {
                $('#myMessage').hide();
            }, 2000);
            $('.addApl').show();
        } else {
            thisApl = apply;
            $.ajax({
                type: "POST",
                url: "/newApply",
                data: newApply,
                dataType: "json",
                success: function(response) {
                    console.log(response.apply);
                    reloadOptions();
                    $('#Apl_mess').html("");
                    $('#Apl_mess').append(
                        '<div class="alert alert-success" id="myMessage">完成!</div>'
                    );
                    setTimeout(function() {
                        $('#myMessage').hide();
                    }, 2000);
                    $('#addApl').empty();
                    $('.addApl').show();
                }
            });
        }

    });
    //delete apply_department
    $(document).on('click', '.delApl', function(e) {
        e.preventDefault();

        function confirmDelete() {
            var result = window.confirm('削除してもよろしいですか？');
            return result;
        }
        var confirmDelete = confirmDelete();
        if (confirmDelete === true) {
            var apply = $('#apply_department').val();
            console.log(apply);
            var delApply = {
                'delApply': apply,
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/delApply",
                data: delApply,
                dataType: "json",
                success: function(response) {
                    console.log(response.apply);
                    reloadOptions();
                    $('#Apl_mess').html("");
                    $('#Apl_mess').append(
                        '<div class="alert alert-success" id="myMessage">削除しました!</div>'
                    );
                    setTimeout(function() {
                        $('#myMessage').hide();
                    }, 2000);
                    $('#addApl').empty();
                }
            });
        }
    });
    $(document).on('click', '.reldApl', function(e) {
        e.preventDefault();
        $('#apply_department option[value=""]').prop('selected', true);
    });
});