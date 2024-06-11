@props(['user'])
<?php
use App\Roles;
$role = $user->role()->get()[0];
$isRoot= Roles::from($role->name) == Roles::Root;
?>
<tr class="border-b-0  my-4">
    <td class="text-center">
        <p class="mb-1 text-base font-medium">
            {{$user->name}}
        </p>
        <p class="text-gray-400">{{$user->email}}</p>
    </td>
    <td class="hidden justify-center xs:flex ">
        <x-role-badge :role="$role"/>
    </td>
    <td>
        <div class="flex items-center justify-center gap-x-2">
            <a href="{{route("edit-user", $user->id)}}" class="btn btn-circle btn-outline btn-sm shadow">
                <i
                    class="fa-solid fa-pencil text-accent1"
                ></i>
            </a>

            @if($isRoot)
                <a class="btn btn-disabled btn-circle btn-outline btn-sm shadow">
                    <i
                        class="fa-solid fa-trash-can text-red-400"
                    ></i>
                </a>
                @else
                <form action="{{route("delete-user", $user->id)}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-circle btn-outline btn-sm shadow">
                        <i
                            class="fa-solid fa-trash-can text-red-500"
                        ></i>
                    </button>
                </form>
            @endif

        </div>
    </td>
</tr>

