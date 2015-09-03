<?php

namespace App\Repositories;


use App\Models\patterns\Pattern;

class PatternRepository extends BaseRepository {



    public function newQuery()
    {
        return $this->getModel()->newQuery();
    }

    public function findOrFail($id)
    {
        return $this->newQuery()->findOrFail($id);
    }



    public function getModel()
    {
        return new Pattern();
    }

    protected function selectPatternList()
    {
        return $this->newQuery()->selectRaw(
            'patterns.*, '
            . '( SELECT COUNT(*) FROM pattern_comments WHERE pattern_comments.pattern_id = patterns.id ) as num_comments,'
            . '( SELECT COUNT(*) FROM pattern_votes WHERE pattern_votes.pattern_id = patterns.id ) as num_votes'
        )->with('author');
    }

    public function paginateLatest()
    {
        return $this->selectPatternList()
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
    }

    public function paginateOpen()
    {
        return $this->selectPatternList()
            ->where('status', 'Open')
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
    }

    public function paginateClosed()
    {
        return $this->selectPatternList()
            ->where('status', 'Closed')
            ->orderBy('created_at', 'DESC')
            ->paginate(20);
    }

    public function openNew($user, $title)
    {
        return $user->patterns()->create([
            'title'  => $title,
            'status' => 'Open'
        ]);
    }
}