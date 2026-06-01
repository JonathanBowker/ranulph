<?php

namespace App\Http\Controllers;

use App\Support\RanulphContent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function __invoke(Request $request): View
    {
        $query = trim((string) $request->query('q', ''));
        $index = collect(RanulphContent::searchIndex());
        $results = collect();

        if ($query !== '') {
            $terms = collect(preg_split('/\s+/', Str::lower($query), -1, PREG_SPLIT_NO_EMPTY))
                ->filter()
                ->values();

            $results = $index
                ->map(function (array $item) use ($query, $terms) {
                    $title = Str::lower($item['title']);
                    $description = Str::lower($item['description']);
                    $keywords = Str::lower(implode(' ', $item['keywords'] ?? []));
                    $fullText = $title.' '.$description.' '.$keywords;

                    $score = 0;

                    if (str_contains($title, Str::lower($query))) {
                        $score += 80;
                    }

                    if (str_contains($description, Str::lower($query))) {
                        $score += 30;
                    }

                    foreach ($terms as $term) {
                        if (str_contains($title, $term)) {
                            $score += 20;
                        }

                        if (str_contains($keywords, $term)) {
                            $score += 12;
                        }

                        if (str_contains($description, $term)) {
                            $score += 8;
                        }
                    }

                    $item['score'] = $score;
                    $item['snippet'] = Str::limit($item['description'], 180);
                    $item['matched'] = $score > 0 || str_contains($fullText, Str::lower($query));

                    return $item;
                })
                ->filter(fn (array $item) => $item['matched'])
                ->sortByDesc('score')
                ->values();
        }

        $facetSource = $query !== '' ? $results : $index;
        $typeCounts = $facetSource->countBy('type')->sortDesc();
        $tagCounts = $facetSource
            ->pluck('tags')
            ->flatten()
            ->filter()
            ->countBy()
            ->sortDesc()
            ->take(16);

        return view('search', [
            'query' => $query,
            'results' => $results,
            'resultCount' => $results->count(),
            'typeCounts' => $typeCounts,
            'tagCounts' => $tagCounts,
        ]);
    }
}
