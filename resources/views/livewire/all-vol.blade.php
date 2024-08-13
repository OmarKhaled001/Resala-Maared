<div>
    <div class="row my-1">
        <div class="d-flex justify-content-between">
            <div class="d-flex ">
                <input id="defaultInput"  class="form-control"
                type="text" placeholder="ابحث" wire:model.live='search'>
                <select  wire:model.live='status' class="form-select mx-1" >
                    <option value="" selected >الكل</option>
                    <option value="مسئول">مسئول</option>
                    <option value="مشروع مسئول">مشروع مسئول</option>
                    <option value="خارج المتابعة">خارج المتابعة</option>
                    <option value="داخل المتابعة">داخل المتابعة</option>
                    <option value="شبل">شبل</option>
                </select>
            </div>
            <div class="d-flex">
                <select  wire:model.live='num' class="form-select mx-1">
                    <option value="10" selected>10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <button class="btn" wire:click="export">Export Excel</button>

        </div>
    </div>
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                <th class="text-start align-middle">الاسم</th>
                <th class="text-center align-middle">الرقم</th>
                <th class="text-center align-middle">التصنيف</th>
                <th class="text-center align-middle"></th>
                </tr>
            </thead>
            @if (count($vols)> 0)
            <tbody>
                @foreach ($vols as $vol)
                <tr>
                <td class="text-start align-middle">{{$vol->name}}</td>
                <td class="text-center align-middle">{{$vol->phone}}</td>
                <td class="text-center align-middle">
                    <span class="badge bg-danger">{{$vol->status}}</span>
                </td>
                <td class="text-center align-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                </td>
                </tr>
                @endforeach
            @else
            <tr class="text-center py-2">
                <td colspan="4" class="alert alert-danger p-2 "> لا يوجد في نتائج البحث</td>
            </tr>
            @endif
            </tbody>
        </table>
    </div>
    {{ $vols->links() }}


</div>
