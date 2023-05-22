// countryマスタ
$(document).ready(function() {
    var thisCountry;
    var arrCtr = [];

    function reloadOptions() {
        $.getJSON("/getCountry", function(data) {
            var options = "";
            // console.log(data);
            $.each(data, function(key, value) {

                options +=
                    '<option value="' +
                    value.name +
                    '">' +
                    value.name +
                    "</option>";
                arrCtr.push(value.name);
            });
            $("#country").html(options);
            $('#country').val(sessionStorage.getItem('selectedValue'));
            var stdtCtrVal = $('#stdtCtrVal').val();
            $('#country option[value="' + stdtCtrVal + '"]').prop('selected', true);
            $('#country option[value="' + thisCountry + '"]').prop('selected', true);
        });
    }

    reloadOptions();
    $(document).on("click", ".addCountry", function(e) {
        e.preventDefault();
        $("#addCountry").html("");
        $("#addCountry").append(
            '<br><input type="text" name="newCountry" id="newCountry" class="form-control" autocomplete="off"><br><button type="button" class="cancelBtn btn btn-dark">キャンセル</button><button type="button" class="addNewBtn btn btn-success">Add</button>'
        );
        $('#addCountryButton').hide();
    });

    $(document).on("click", ".cancelBtn", function(e) {
        e.preventDefault();
        $("#addCountry").empty();
        $('#addCountryButton').show();

    });

    //thêm đất nước
    $(document).on("click", ".addNewBtn", function(e) {
        e.preventDefault();
        var country = $("#newCountry").val();
        var newCountry = {
            'newCountry': country,
        };
        $('.addCountry').show();
        // console.log(country);
        thisCountry = country;
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: "/storeCountry",
            data: newCountry,
            dataType: "json",
            success: function(response) {
                console.log(response.data);
                reloadOptions();
                $("#message").html("");
                $("#message").append(
                    '<div class="alert alert-success" id="myMessage">完成!</div>'
                );
                setTimeout(function() {
                    $("#myMessage").hide();
                }, 2000);
                $("#addCountry").empty();
            },
        });
    });
    //xóa dữ liệu

    $(document).on("click", ".delCtr", function(e) {
        e.preventDefault();
        var country = $("#country").val();
        // console.log(country);
        if (confirm("Bạn có chắc muốn xóa " + country + " không?")) {
            var delCountry = {
                'delCountry': country,
            };


            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            $.ajax({
                type: "POST",
                url: "/delCountry",
                data: delCountry,
                dataType: "json",
                success: function(response) {
                    // console.log(response.country);
                    reloadOptions();
                    $("#message").html("");
                    $("#message").append(
                        '<div class="alert alert-success" id="myMessage">削除しました!</div>'
                    );
                    setTimeout(function() {
                        $("#myMessage").hide();
                    }, 2000);
                    $("#addCountry").empty();
                },
            });
        }
    });
    $(document).on("click", ".reload", function(e) {
        e.preventDefault();
        $('#country option[value=""]').prop("selected", true);
    });
});

function resetSelect() {
    $('#country').val('');
}