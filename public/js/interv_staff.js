    // $(document).ready(function() {
    //     var thisStaff;
    //     var arrStf = [];

    //     function reloadOptions() {
    //         $.getJSON('/getStaff', function(data) {
    //             var options = '';
    //             $.each(data, function(key, value) {
    //                 options += '<option value="' + value.name + '">' + value.name +
    //                     '</option>';
    //                 arrStf.push(value.name);
    //             });
    //             $('.interv_staff').html(options);

    //     }
    //     reloadOptions();

    // });

    // interview_staffマスタ
    $(document).ready(function() {
        var thisStaff1;
        var thisStaff2;
        var arrStf = [];
        // var result = confirmDelete();

        function reloadOptions() {
            $.getJSON('/getStaff', function(data) {
                var options = '';
                $.each(data, function(key, value) {
                    options += '<option value="' + value.name + '">' + value.name +
                        '</option>';
                    arrStf.push(value.name);
                });
                $('.interv_staff').html(options);
                var first_interv_staffValue = sessionStorage.getItem('first_interv_staff_value');
                var sec_interv_staffValue = sessionStorage.getItem('sec_interv_staff_value');
                var fstIntvStaff = $('#fstIntvStaff').val();
                var secIntvStaff = $('#secIntvStaff').val();
                $('#first_interv_staff').val(first_interv_staffValue);
                $('#sec_interv_staff').val(sec_interv_staffValue);
                $('#first_interv_staff option[value="' + fstIntvStaff + '"]').prop('selected', true);
                $('#first_interv_staff option[value="' + thisStaff1 + '"]').prop('selected', true);
                $('#sec_interv_staff option[value="' + secIntvStaff + '"]').prop('selected', true);
                $('#sec_interv_staff option[value="' + thisStaff2 + '"]').prop('selected', true);
            });
        }
        reloadOptions();
        // console.log(arrStf);
        $(document).on('click', '.addStaff1', function(e) {
            e.preventDefault();
            $('#addStaff1').html("");
            $('.addStaff1').hide();
            $('#addStaff1').append(
                '<br><input type="text" name="newStaff1" id="newStaff1" class="form-control" autocomplete="off"><br><button type="button" class="caclStf1 btn btn-dark">キャンセル</button><button type="button" class="addNewStf1 btn btn-success">Add</button>'
            );
        });
        $(document).on('click', '.caclStf1', function(e) {
            e.preventDefault();
            $('#addStaff1').empty();
            $('.addStaff1').show();
        });
        //add staff
        $(document).on('click', '.addNewStf1', function(e) {
            e.preventDefault();
            var staff = $('#newStaff1').val();
            var newStaff = {
                    'newStaff': staff,
                }
                // console.log(newStaff);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if (staff === '') {
                $('#addStaff1').empty();
                $('#Stf_mess1').html("");
                $('#Stf_mess1').append(
                    '<div class="alert alert-danger" id="myMessage">エーラです!</div>'
                );
                setTimeout(function() {
                    $('#myMessage').hide();
                }, 2000);
                $('.addStaff1').show();
            } else if (arrStf.includes(staff)) {
                $('#addStaff1').empty();
                $('#Stf_mess1').html("");
                $('#Stf_mess1').append(
                    '<div class="alert alert-danger" id="myMessage">エーラです!データが存在されています!</div>'
                );
                setTimeout(function() {
                    $('#myMessage').hide();
                }, 2000);
                $('.addStaff1').show();
            } else {
                thisStaff1 = staff;
                $.ajax({
                    type: "POST",
                    url: "/newStaff",
                    data: newStaff,
                    dataType: "json",
                    success: function(response) {
                        console.log(response.country);
                        reloadOptions();
                        $('#Stf_mess1').html("");
                        $('#Stf_mess1').append(
                            '<div class="alert alert-success" id="myMessage">完成!</div>'
                        );
                        setTimeout(function() {
                            $('#myMessage').hide();
                        }, 2000);
                        $('#addStaff1').empty();
                        $('.addStaff1').show();
                    }
                });
            }
        });
        //delete staff
        $(document).on('click', '.delStf1', function(e) {
            function confirmDelete() {
                var result = window.confirm('削除してもよろしいですか？');
                return result;
            }
            var confirmDelete = confirmDelete();
            e.preventDefault();
            if (confirmDelete === true) {
                var staff = $('#first_interv_staff').val();
                console.log(staff);
                var delStaff = {
                    'delStaff': staff,
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/delStaff",
                    data: delStaff,
                    dataType: "json",
                    success: function(response) {
                        console.log(response.staff);
                        reloadOptions();
                        $('#Stf_mess1').html("");
                        $('#Stf_mess1').append(
                            '<div class="alert alert-success" id="myMessage">削除しました!</div>'
                        );
                        setTimeout(function() {
                            $('#myMessage').hide();
                        }, 2000);
                        $('#addStaff1').empty();
                    }
                });
            }
        });
        $(document).on('click', '.reldStf1', function(e) {
            e.preventDefault();
            $('#first_interv_staff option[value=""]').prop('selected', true);
        });
        $(document).on('click', '.addStaff2', function(e) {
            e.preventDefault();
            $('#addStaff2').html("");
            $('.addStaff2').hide();
            $('#addStaff2').append(
                '<br><input type="text" name="newStaff2" id="newStaff2" class="form-control" autocomplete="off"><br><button type="button" class="caclStf2 btn btn-dark">キャンセル</button><button type="button" class="addNewStf2 btn btn-success">Add</button>'
            );
        });
        $(document).on('click', '.caclStf2', function(e) {
            e.preventDefault();
            $('#addStaff2').empty();
            $('.addStaff2').show();
        });
        //add staff
        $(document).on('click', '.addNewStf2', function(e) {
            e.preventDefault();
            var staff = $('#newStaff2').val();
            var newStaff = {
                'newStaff': staff,
            }
            console.log(staff);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if (staff === '') {
                $('#addStaff2').empty();
                $('#Stf_mess2').html("");
                $('#Stf_mess2').append(
                    '<div class="alert alert-danger" id="myMessage">エーラです!</div>'
                );
                setTimeout(function() {
                    $('#myMessage').hide();
                }, 2000);
                $('.addStaff2').show();
            } else if (arrStf.includes(staff)) {
                $('#addStaff2').empty();
                $('#Stf_mess2').html("");
                $('#Stf_mess2').append(
                    '<div class="alert alert-danger" id="myMessage">エーラです!データが存在されています!</div>'
                );
                setTimeout(function() {
                    $('#myMessage').hide();
                }, 2000);
                $('.addStaff2').show();
            } else {
                thisStaff2 = staff;
                $.ajax({
                    type: "POST",
                    url: "/newStaff",
                    data: newStaff,
                    dataType: "json",
                    success: function(response) {
                        console.log(response.country);
                        reloadOptions();
                        $('#Stf_mess2').html("");
                        $('#Stf_mess2').append(
                            '<div class="alert alert-success" id="myMessage">完成!</div>'
                        );
                        setTimeout(function() {
                            $('#myMessage').hide();
                        }, 2000);
                        $('#addStaff2').empty();
                        $('.addStaff2').show();
                    }
                });
            }
        });
        //delete staff
        $(document).on('click', '.delStf2', function(e) {
            function confirmDelete() {
                var result = window.confirm('削除してもよろしいですか？');
                return result;
            }
            var confirmDelete = confirmDelete();
            e.preventDefault();
            if (confirmDelete === true) {
                var staff = $('#sec_interv_staff').val();
                console.log(staff);
                var delStaff = {
                    'delStaff': staff,
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/delStaff",
                    data: delStaff,
                    dataType: "json",
                    success: function(response) {
                        console.log(response.staff);
                        reloadOptions();
                        $('#Stf_mess2').html("");
                        $('#Stf_mess2').append(
                            '<div class="alert alert-success" id="myMessage">削除しました!</div>'
                        );
                        setTimeout(function() {
                            $('#myMessage').hide();
                        }, 2000);
                        $('#addStaff2').empty();
                    }
                });
            }
        });
        $(document).on('click', '.reldStf2', function(e) {
            e.preventDefault();
            $('#sec_interv_staff option[value=""]').prop('selected', true);
        });
    });
    // end interview_staffマスタ