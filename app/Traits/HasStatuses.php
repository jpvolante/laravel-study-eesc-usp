<?php
namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Spatie\ModelStatus\Events\StatusUpdated;

trait HasStatuses {
    use \Spatie\ModelStatus\HasStatuses;

    public function forceSetStatus(string $name, ?string $reason = null): self
    {
        $oldStatus = $this->latestStatus();

        $newStatus = $this->statuses()->create([
            'name'   => $name,
            'reason' => $reason,
            'user_id' => Auth::user()->id
        ]);

        event(new StatusUpdated($oldStatus, $newStatus, $this));

        return $this;
    }
}