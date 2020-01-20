<?php

namespace Tests\Feature\app\Http\Controllers\Structural;

use Symfony\Component\HttpFoundation\Response as HttpResponse;
use App\UseCases\MarkdownFormat\DisplayCommentAsAWebsiteUseCase;
use Illuminate\Contracts\Container\BindingResolutionException;
use App\Http\Controllers\Structural\DecoratorController;
use Tests\TestCase;

/**
 * Class DecoratorControllerTest
 * @package Tests\Feature\app\Http\Controllers\Structural
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class DecoratorControllerTest extends TestCase
{
    /**
     * @var DecoratorController
     */
    private $decoratorController;

    /**
     * @var mixed
     */
    private $dangerousComment;

    /**
     * @var mixed
     */
    private $dangerousForumPost;

    /**
     * @throws BindingResolutionException
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->decoratorController = $this->app->make(DecoratorController::class);
        $this->dangerousComment = <<<HERE
Hello! Nice blog post!
Please visit my <a href='http://www.iwillhackyou.com'>homepage</a>.
<script src="http://www.iwillhackyou.com/script.js">
  performXSSAttack();
</script>
HERE;
        $this->dangerousForumPost = <<<HERE
# Welcome

This is my first post on this **gorgeous** forum.

<script src="http://www.iwillhackyou.com/script.js">
  performXSSAttack();
</script>
HERE;
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testTextInputDangerousComment(): void
    {
        $decoratorResult = $this->decoratorController->__invoke(
            DisplayCommentAsAWebsiteUseCase::TEXT_INPUT,
            $this->dangerousComment
        );

        $this->assertEquals($decoratorResult->getStatusCode(), HttpResponse::HTTP_OK);
        $this->assertNotEmpty($decoratorResult->getOriginalContent());
        $this->assertArrayHasKey('html', $decoratorResult->getOriginalContent());
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPlainTextFiltertDangerousComment(): void
    {
        $decoratorResult = $this->decoratorController->__invoke(
            DisplayCommentAsAWebsiteUseCase::PLAIN_TEXT_FILTER,
            $this->dangerousComment
        );

        $this->assertEquals($decoratorResult->getStatusCode(), HttpResponse::HTTP_OK);
        $this->assertNotEmpty($decoratorResult->getOriginalContent());
        $this->assertArrayHasKey('html', $decoratorResult->getOriginalContent());
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPlainTextFiltertDangerousForumPost(): void
    {
        $decoratorResult = $this->decoratorController->__invoke(
            DisplayCommentAsAWebsiteUseCase::TEXT_INPUT,
            $this->dangerousForumPost
        );

        $this->assertEquals($decoratorResult->getStatusCode(), HttpResponse::HTTP_OK);
        $this->assertNotEmpty($decoratorResult->getOriginalContent());
        $this->assertArrayHasKey('html', $decoratorResult->getOriginalContent());
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMarkdownFormattDangerousForumPost(): void
    {
        $decoratorResult = $this->decoratorController->__invoke(
            DisplayCommentAsAWebsiteUseCase::MARKDOWN_FORMAT,
            $this->dangerousForumPost
        );

        $this->assertEquals($decoratorResult->getStatusCode(), HttpResponse::HTTP_OK);
        $this->assertNotEmpty($decoratorResult->getOriginalContent());
        $this->assertArrayHasKey('html', $decoratorResult->getOriginalContent());
    }
}
