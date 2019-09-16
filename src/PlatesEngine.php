<?php

namespace Interop\Template\Plates;

use Interop\Template\TemplateEngineInterface;
use Interop\Template\Exception\TemplateNotFound;
use Interop\Template\Exception\TemplateExceptionInterface;
use League\Plates\Engine as Plates;
use Exception, RuntimeException;

final class PlatesEngine implements TemplateEngineInterface
{
    /** @var Plates */
    private $plates;

    /** @var string */
    private $suffix;

    public function __construct(Plates $plates, string $suffix = '')
    {
        $this->plates = $plates;
        $this->suffix = $suffix;
    }

    /**
     * @param string $templateName
     * @param array $parameters
     * @return string
     * @throws TemplateExceptionInterface
     */
    public function render(string $templateName, array $parameters = []): string
    {
        try {
            return $this->plates->render($templateName . $this->suffix, $parameters);
        } catch (Exception $e) {
            if (strpos($e->getMessage(), 'Missing template') === 0) {
                throw TemplateNotFound::fromName($templateName, 0, $e);
            }

            // Cast exception to template-interop one
            throw new class($e->getMessage(), $e->getCode(), $e) extends RuntimeException implements TemplateExceptionInterface {};
        }
    }
}
