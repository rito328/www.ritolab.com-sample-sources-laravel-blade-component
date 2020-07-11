<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Enums\Stage;
use App\Models\User;
use Illuminate\View\Component;

class PointStage extends Component
{
    /** @var int 現在のポイント */
    public $currentPoint;

    /** @var string 現在のステージ */
    public $currentStageName;

    /** @var string|null 次のステージ名 */
    public $nextStageName;

    /** @var int|null 次のステージアップに必要なポイント */
    public $pointsNeededForNextStage;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $stage = Stage::getStage($user->point);

        $this->currentPoint             = $user->point;
        $this->currentStageName         = $stage->value;
        $this->nextStageName            = $stage->getNextStage();
        $this->pointsNeededForNextStage = $stage->getPointsNeededForNextStage($user->point);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.point-stage');
    }
}
