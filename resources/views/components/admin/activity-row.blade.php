@props(['activity'])

@php
$actionIsUser=false;
$actionMsg= "null";
switch ($activity->action) {
    case 'create user':
        $actionMsg = 'Izveidots lietotājs';
        $actionIsUser = true;
        break;
    case 'delete user':
        $actionMsg = 'Dzēsts lietotājs';
        $actionIsUser = true;
        break;
    case 'create news':
        $actionMsg = 'Izveidota aktualitāte';
        break;
    case 'delete news':
        $actionMsg = 'Dzēsta aktualitāte';
        break;
    case 'create vacancy':
        $actionMsg = 'Izveidota vakance';
        break;
    case 'delete vacancy':
        $actionMsg = 'Dzēsta vakance';
        break;
}

use App\Roles;
try{
    $role=$activity->user()->first()->role()->first();
}catch (Exception $e){
    $role="";
}
@endphp

<tr class="my-4 border-b-0 align-middle">
    <td class="text-center">
        <p class="mb-1 text-base font-medium">
            {{$actionMsg}}
        </p>
    </td>
    <td class="text-center">
        <p class="mb-1 text-base font-medium">
            {{$activity->user()->first()->name}}
        </p>
        <p class="text-gray-400">{{$activity->user()->first()->email}}</p>
    </td>
    <td class="items-center justify-center text-center">
        @if($actionIsUser)
            <x-role-badge :role="$role"/>
        @else
            <p class="mb-1 line-clamp-1 text-base font-medium min-w-32">
                {{$activity->desc}}
            </p>
        @endif
{{--        <div class="badge badge-outline h-auto gap-2 border-gray-400 py-1 shadow">--}}
{{--            <i class="fa-solid fa-shield text-base text-accent1"></i>--}}
{{--            <p class="text-sm">Administrators</p>--}}
{{--        </div>--}}
    </td>
</tr>
