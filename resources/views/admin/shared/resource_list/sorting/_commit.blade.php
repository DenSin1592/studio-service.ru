@if(isset($updateUrl, $reloadUrl))
<div class="sorting-control">
    <span>Сортировка:</span>
    <button data-sortable-update-positions="{{ route($updateUrl) }}"
            class="btn btn-primary btn-xs">Сохранить сортировку</button>
    <button data-sortable-refresh-list="{{ route($reloadUrl) }}"
            class="btn btn-default btn-xs">Вернуть к исходному варианту</button>
</div>
@endif
