<?php

namespace App\Http\Controllers;

use App\Support\MarketingContent;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
        return view('marketing.list-page', [
            'pageTitle' => 'Opinions',
            'metaTitle' => 'Opinions | Ranulph',
            'kicker' => 'Opinions',
            'intro' => 'Working views on brand governance, machine-readable policy, controlled AI, and the operating patterns behind deployable assurance.',
            'items' => MarketingContent::opinions(),
            'rssLabel' => 'Opinions RSS',
            'showRss' => true,
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
