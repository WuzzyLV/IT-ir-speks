@props(['role'])
{{--Kind of overcomplicating because i wanna use the enum instead of just comparing strings but oh well--}}
<?php use App\Roles;  $enumRole= Roles::from($role->name)  ?>

<div
    class="badge badge-outline gap-2 border-gray-400 py-3 shadow"
>
@switch($enumRole)
    @case(Roles::Moderator)
            <i
                class="fa-solid fa-shield-halved text-base text-accent1"
            ></i>
            <p class="text-sm">Moderators</p>
        @break
    @case(Roles::Admin)
            <i
                class="fa-solid fa-shield text-base text-accent1"
            ></i>
            <p class="text-sm">Administrators</p>
        @break
    @case(Roles::Root)
            <i
                class="fa-solid fa-crown text-base text-accent1"
            ></i>
            <p class="text-sm">Priekšnieks</p>
        @break
@endswitch
</div>

