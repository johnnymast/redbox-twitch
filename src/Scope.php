<?php
namespace Redbox\Twitch;

class Scope
{
    const SCOPE_USER_READ            = 'user_read';
    const SCOPE_USER_BLOCKS_EDIT     = 'user_blocks_edit';
    const SCOPE_USER_BLOCKS_READ     = 'user_blocks_read';
    const SCOPE_USER_FOLLOWERS_EDIT  = 'user_follows_edit';
    const CHANNEL_READ               = 'channel_read';
    const CHANNEL_EDITOR             = 'channel_editor';
    const CHANNEL_COMMERCIAL         = 'channel_commercial';
    const CHANNEL_STREAM             = 'channel_stream';
    const CHANNEL_SUBSCRIPTIONS      = 'channel_subscriptions';
    const USER_SUBSCRIPTIONS         = 'user_subscriptions';
    const CHANNEL_CHECK_SUBSCRIPTION = 'channel_check_subscription';
    const CHAT_LOGIN                 = 'chat_login';
}