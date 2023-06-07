<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="countryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" id="" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" class="modalText">
            </div>
            <div class="modal-footer">
                <button type="button" id="" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="ConfigButton">Understood</button>
            </div>
        </div>
    </div>
</div>
<script>
var Button = document.getElementsByClassName('modalText');
var addCountryButton = document.getElementById('addCountry');
var ConfigButton = document.getElementById('ConfigButton');

addCountryButton.onclick = function() {
    Button[0].id = 'newCountry';
    ConfigButton.className = 'addNewBtn btn btn-success';
}

    // var totalButton = document.getElementsByTagName('button#modal');


</script>