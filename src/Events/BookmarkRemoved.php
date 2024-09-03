<?php

namespace LaraZeus\Delia\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BookmarkRemoved
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public Bookmark $bookmark;

    public function __construct(Bookmark $bookmark)
    {
        $this->bookmark = $bookmark;
    }

    /**
     * Get the channels the event should broadcast on.
     */
    public function broadcastOn(): Channel | PrivateChannel | array
    {
        return new PrivateChannel('bookmark-removed');
    }
}
