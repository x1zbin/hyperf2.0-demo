<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\Snowflake\IdGeneratorInterface;

/**
 * @AutoController(prefix="snowflake")
 */
class SnowflakeController extends Controller
{
    /**
     * @Inject
     * @var IdGeneratorInterface
     */
    protected $idGenerator;

    public function index()
    {
        $id = $this->idGenerator->generate();
        $count = strlen((string) $id);
        var_dump($count);
        return $this->response->success($id);
    }

    public function meta()
    {
        $id = PHP_INT_MAX;
        $meta = $this->idGenerator->degenerate($id);
        var_dump($meta->getTimestamp() / 3600 / 24 / 365);
        return $this->response->success();
    }
}
