<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testWelcomePageLoadsForGuests()
    {
        $response = $this->get('/');

        $response
            ->assertStatus(200)
            ->assertSeeText("The risks you'll actually face don't show up in compliance checklists.", false)
            ->assertSeeText('Whose risk are you trying to understand?', false)
            ->assertSeeText('Sign in', false);
    }

    public function testRanulphEnquiryCanBeSubmitted()
    {
        $response = $this->post(route('ranulph.enquiry'), [
            'name' => 'Jonathan Bowker',
            'email' => 'jonathan@example.com',
            'organisation' => 'Advanced Analytica',
            'role' => 'Direct investor',
            'preferred_next_step' => 'Book a scoping call',
            'message' => 'We need a deeper integrity read.',
            'branch' => 'other',
            'leaf' => 'deal_deep_dive',
            'freebie_requested' => 'Risk Assessment and Action Plan template plus redacted deal example.',
            'time_sensitive' => 'yes',
            'confidentiality_consent' => 'yes',
        ]);

        $response
            ->assertRedirect(url('/').'#contact')
            ->assertSessionHas('ranulph_status');
    }

    public function testLocalSearchReturnsRelevantResults()
    {
        $response = $this->get(route('search', ['q' => 'fraud']));

        $response
            ->assertOk()
            ->assertSeeText('Find what you need', false)
            ->assertSeeText('Fraud Controls Diagnostic', false)
            ->assertSeeText('2 results', false);
    }

    public function testMarketingPagesLoad()
    {
        $this->get(route('use-cases'))->assertOk()->assertSeeText('Use Cases', false);
        $this->get(route('opinions'))->assertOk()->assertSeeText('Opinions', false);
        $this->get(route('resources'))->assertOk()->assertSeeText('Resources', false);
        $this->get(route('about'))->assertOk()->assertSeeText('AI governance you can operate', false);
        $this->get(route('contact'))->assertOk()->assertSeeText('Contact', false);
        $this->get(route('security'))->assertOk()->assertSeeText('Security', false);
        $this->get(route('privacy'))->assertOk()->assertSeeText('Privacy', false);
        $this->get(route('terms'))->assertOk()->assertSeeText('Terms', false);
        $this->get(route('rss-feeds'))->assertOk()->assertSeeText('RSS Feeds', false);
    }

    public function testPortalRoutesRequireAuthentication()
    {
        $this->get('/dashboard')->assertRedirect(route('login'));
        $this->get('/workspaces')->assertRedirect(route('login'));
        $this->get('/billing')->assertRedirect(route('login'));
        $this->get('/support')->assertRedirect(route('login'));
    }

    public function testAuthenticatedUserCanAccessPortalRoutes()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $this->get('/dashboard')->assertOk()->assertSee('Operations Hub');
        $this->get('/workspaces')->assertOk()->assertSee('Workspace Registry');
        $this->get('/billing')->assertOk()->assertSee('Billing Control');
        $this->get('/support')->assertOk()->assertSee('Support Operations');
    }
}
