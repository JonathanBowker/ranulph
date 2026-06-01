<?php

namespace App\Http\Controllers;

use App\Support\MarketingContent;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MarketingPageController extends Controller
{
    public function useCases(): View
    {
        return view('marketing.list-page', [
            'pageTitle' => 'Use Cases',
            'metaTitle' => 'Use Cases | Ranulph',
            'kicker' => 'Use Cases',
            'intro' => 'Practical use cases showing how teams deploy governed operating models to control brand meaning across AI systems, operations, and policy workflows.',
            'items' => MarketingContent::useCases(),
            'rssLabel' => 'Use Cases RSS',
            'showRss' => true,
        ]);
    }

    public function opinions(): View
    {
        $items = collect(MarketingContent::opinions())
            ->map(fn (array $item) => [
                ...$item,
                'url' => route('opinions.show', $item['slug']),
            ])
            ->all();

        return view('marketing.list-page', [
            'pageTitle' => 'Opinions',
            'metaTitle' => 'Opinions | Ranulph',
            'kicker' => 'Opinions',
            'intro' => 'Working views on brand governance, machine-readable policy, controlled AI, and the operating patterns behind deployable assurance.',
            'items' => $items,
            'rssLabel' => 'Opinions RSS',
            'showRss' => true,
        ]);
    }

    public function showOpinion(string $slug): View
    {
        $article = MarketingContent::opinion($slug);

        if (! $article) {
            throw new NotFoundHttpException();
        }

        return view('marketing.article-page', [
            'metaTitle' => $article['title'].' | Ranulph',
            'kicker' => $article['series'],
            'article' => $article,
            'backLabel' => 'Back to Opinions',
            'backUrl' => route('opinions'),
        ]);
    }

    public function resources(): View
    {
        return view('marketing.list-page', [
            'pageTitle' => 'Resources',
            'metaTitle' => 'Resources | Ranulph',
            'kicker' => 'Resources',
            'intro' => 'Practical resources for teams building policy-aware AI and risk systems: guides, templates, checklists, and reference material.',
            'items' => MarketingContent::resources(),
            'rssLabel' => 'Resources RSS',
            'showRss' => true,
        ]);
    }

    public function about(): View
    {
        return view('marketing.about', [
            'metaTitle' => 'About | Ranulph',
            'sections' => MarketingContent::aboutSections(),
            'principles' => MarketingContent::aboutPrinciples(),
        ]);
    }

    public function simple(Request $request, string $page): View
    {
        $content = MarketingContent::simplePages()[$page] ?? abort(404);

        return view('marketing.simple-page', [
            'metaTitle' => $content['title'].' | Ranulph',
            'content' => $content,
        ]);
    }
}
