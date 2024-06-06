<?php

namespace App;

enum Roles: string
{
    case Root = 'root';
    case Admin = 'admin';
    case Moderator = 'moderator';
}
