@props(['page', 'totalPages'])

<div class="join border-gray-300">
    <form>
        <input type="hidden" name="page" value="{{$page-1}}">
        <button {{$page-1==0 ? "disabled" : "" }} class="{{$page-1==0 ? "btn-disabled" : "" }} join-item btn bg-transparent btn-sm !rounded-l-lg !text-gray-900  !border-gray-300 hover:bg-gray-300/50">«</button>
    </form>
    <button class="join-item btn bg-transparent btn-sm !text-gray-900 !border-gray-300 hover:bg-gray-300/50 px-6 pointer-events-none	">{{$page}}</button>
    <form class="inline-block">
        <input type="hidden" name="page" value="{{$page+1}}">
        <button class="{{$page+1>$totalPages ? "btn-disabled" : "" }} join-item btn bg-transparent btn-sm !rounded-r-lg !text-gray-900 !border-gray-300 hover:bg-gray-300/50">»</button>
    </form>
</div>
