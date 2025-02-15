<?php

use App\Events\NewChatMessage;
use App\Models\ChatMessage;

$chat = ChatMessage::create([
    'username' => 'test',
    'message' => 'test',
]);

event(new NewChatMessage($chat));
