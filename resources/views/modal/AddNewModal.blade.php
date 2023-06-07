{{-- @extends('layout') --}}

<!-- Button trigger modal -->
<script>
    totalId = getElementById('');
    console.log(total)

</script>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
{{-- add country --}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">追加</h5>
                <button type="button" class="" data-tooltip="削除" data-bs-dismiss="modal" aria-label="Close">
                    <iconify-icon icon="fxemoji:cancellationx" width="18" height="18" style="margin-top: 3px">
                    </iconify-icon>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <strong>国追加</strong>
                    <input type="text" name="newCountry" id="newCountry" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" style="margin: 2%;"class="" data-tooltip="キャンセル" data-bs-dismiss="modal">
                    <iconify-icon icon="typcn:arrow-back" width="20" height="20" style="margin-top: 3px">
                    </iconify-icon>
                </button>
                <button type="button" style="margin: 2%;" class="addNewCtr" data-tooltip="追加" data-bs-dismiss="modal">
                    <iconify-icon icon="el:ok" width="18" height="18" style="margin-top: 3px"></iconify-icon>
                </button>
            </div>
        </div>
    </div>
</div>
{{-- add staff1 --}}
<div class="modal fade" id="addStaff1Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">追加</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <strong>一次面接の対応者追加</strong>
                    <input type="text" name="newStaff1" id="newStaff1" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" style="margin: 2%;"class="" data-tooltip="キャンセル"
                    data-bs-dismiss="modal">
                    <iconify-icon icon="typcn:arrow-back" width="20" height="20" style="margin-top: 3px">
                    </iconify-icon>
                </button>
                <button type="button" style="margin: 2%;" class="addNewStf1" data-tooltip="追加"
                    data-bs-dismiss="modal">
                    <iconify-icon icon="el:ok" width="18" height="18" style="margin-top: 3px">
                    </iconify-icon>
                </button>
            </div>
        </div>
    </div>
</div>
{{-- add staff2 --}}
<div class="modal fade" id="addStaff_2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">追加</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <strong>二次面接の対応者追加</strong>
                    <input type="text" name="newStaff2" id="newStaff2" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" style="margin: 2%;"class="" data-tooltip="キャンセル"
                    data-bs-dismiss="modal">
                    <iconify-icon icon="typcn:arrow-back" width="20" height="20" style="margin-top: 3px">
                    </iconify-icon>
                </button>
                <button type="button" style="margin: 2%;" class="addNewStf2" data-tooltip="追加"
                    data-bs-dismiss="modal">
                    <iconify-icon icon="el:ok" width="18" height="18" style="margin-top: 3px">
                    </iconify-icon>
                </button>
            </div>
        </div>
    </div>
</div>
{{-- add dpm --}}
<div class="modal fade" id="addDpmtModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">追加</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <strong>インターンの対応者追加</strong>
                    <input type="text" name="newDepartment" id="newDepartment" class="form-control"
                        autocomplete="off">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" style="margin: 2%;"class="" data-tooltip="キャンセル"
                    data-bs-dismiss="modal">
                    <iconify-icon icon="typcn:arrow-back" width="20" height="20" style="margin-top: 3px">
                    </iconify-icon>
                </button>
                <button type="button" style="margin: 2%;" class="addNewDpmt" data-tooltip="追加"
                    data-bs-dismiss="modal">
                    <iconify-icon icon="el:ok" width="18" height="18" style="margin-top: 3px">
                    </iconify-icon>
                </button>
            </div>
        </div>
    </div>
</div>
{{-- add skill_SE --}}
<div class="modal fade" id="addSkillModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">追加</h5>
                <button type="button" class="" data-tooltip="削除" data-bs-dismiss="modal" aria-label="Close">
                    <iconify-icon icon="mdi:cancel-box-outline"></iconify-icon>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <strong>スキルシステムエンジニア追加</strong>
                    <input type="text" name="newSkill" id="newSkill" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" style="margin: 2%;"class="" data-tooltip="キャンセル"
                    data-bs-dismiss="modal">
                    <iconify-icon icon="typcn:arrow-back" width="20" height="20" style="margin-top: 3px">
                    </iconify-icon>
                </button>
                <button type="button" style="margin: 2%;" class="addNewSkill" data-tooltip="追加"
                    data-bs-dismiss="modal">
                    <iconify-icon icon="el:ok" width="18" height="18" style="margin-top: 3px">
                    </iconify-icon>
                </button>
            </div>
        </div>
    </div>
</div>
{{-- add 応募職種 --}}
<div class="modal fade" id="addAplModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">追加</h5>
                <button type="button" class="" data-tooltip="削除" data-bs-dismiss="modal" aria-label="Close">
                    <iconify-icon icon="fxemoji:cancellationx" width="18" height="18"
                        style="margin-top: 3px"></iconify-icon>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <strong>応募職種追加</strong>
                    <input type="text" name="newApply" id="newApply" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" style="margin: 2%;"class="" data-tooltip="キャンセル"
                    data-bs-dismiss="modal">
                    <iconify-icon icon="typcn:arrow-back" width="20" height="20" style="margin-top: 3px">
                    </iconify-icon>
                </button>
                <button type="button" style="margin: 2%;" class="addNewApl" data-tooltip="追加"
                    data-bs-dismiss="modal">
                    <iconify-icon icon="el:ok" width="18" height="18" style="margin-top: 3px">
                    </iconify-icon>
                </button>
            </div>
        </div>
    </div>
</div>
{{-- add 希望勤務地 --}}
<div class="modal fade" id="addPlcModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">追加</h5>
                <button type="button" class="" data-tooltip="削除" data-bs-dismiss="modal" aria-label="Close">
                    <iconify-icon icon="fxemoji:cancellationx" width="18" height="18"
                        style="margin-top: 3px"></iconify-icon>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <strong>希望勤務地追加</strong>
                    <input type="text" name="newPlace" id="newPlace" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" style="margin: 2%;"class="" data-tooltip="キャンセル"
                    data-bs-dismiss="modal">
                    <iconify-icon icon="typcn:arrow-back" width="20" height="20" style="margin-top: 3px">
                    </iconify-icon>
                </button>
                <button type="button" style="margin: 2%;" class="addNewPlc" data-tooltip="追加"
                    data-bs-dismiss="modal">
                    <iconify-icon icon="el:ok" width="18" height="18" style="margin-top: 3px">
                    </iconify-icon>
                </button>
            </div>
        </div>
    </div>
</div>