<?php

namespace App\Enum;

enum PermissionEnum:string
{
    //

    case ManageUser='manageUser';
    case MangeFeature='manageFeature';
    case ManageComment='manageComment';
    case UpvoteDownvote='upvoteDownvote';
}
