// Lưu trữ chuỗi trong session
// $.session.set('myVariable', 'Hello world!');

// // Lấy giá trị từ session và hiển thị nó trên trang web
// var myVariable = $.session.get('myVariable');
// $('#myDiv').text(myVariable);


$(document).ready(function() {
    $('#saveButton').click(function() {
        var input = $('#inputValue').val();
        var value = {
            'name': 'tien',
            'value': input,
            // _token: '{{ csrf_token() }}'
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/getData",
            data: value,
            dataType: "json",
            success: function(response) {
                console.log(input);
                console.log(response.status);
                console.log(response.name);
                $('#select').append('<option>' + response.inputValue + '</option>');
                $('#select').append('<option>' + response.name + '</option>');
            }
        });
    });
});