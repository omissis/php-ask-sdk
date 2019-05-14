<?php

namespace Omissis\AlexaSdk\Model\Skill\Manifest\PublishingInformation;

final class Locale
{
    /**
     * Undocumented field.
     *
     * @var string
     */
    private $name;

    /**
     * Summary description of the skill, which is shown when viewing the list of skills.
     *
     * @var string
     */
    private $summary;

    /**
     * A full description explaining the skill’s core functionality and any prerequisites to using it (such as additional hardware, software, or accounts). For a Flash Briefing skill, you must list the feeds for the skill.
     *
     * @var string
     */
    private $description;

    /**
     * URL to a small icon for the skill, which is shown in the list of skills. (108x108px)
     *
     * @var string
     */
    private $smallIconUri;

    /**
     * URL to a large icon that represents this skill. (512x512px)
     *
     * @var string
     */
    private $largeIconUri;

    /**
     * Three example phrases that illustrate how users can invoke your skill. For accuracy, these phrases must come directly from your sample utterances.
     *
     * @var array<string>
     */
    private $examplePhrases;

    /**
     * Sample keyword phrases that describe the skill.
     *
     * @var array<string>
     */
    private $keywords;

    /**
     * Description of the skill's new features and fixes in the version. Should describe changes in the revisions of the skill.
     *
     * @var null|string
     */
    private $updatesDescription;

    /**
     * @param array<string> $examplePhrases
     * @param array<string> $keywords
     */
    public function __construct(
        string $name,
        string $summary,
        string $description,
        string $smallIconUri,
        string $largeIconUri,
        array $examplePhrases,
        array $keywords,
        ?string $updatesDescription = null
    ) {
        $this->name = $name;
        $this->summary = $summary;
        $this->description = $description;
        $this->smallIconUri = $smallIconUri;
        $this->largeIconUri = $largeIconUri;
        $this->examplePhrases = $examplePhrases;
        $this->keywords = $keywords;
        $this->updatesDescription = $updatesDescription;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSummary(): string
    {
        return $this->summary;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getSmallIconUri(): string
    {
        return $this->smallIconUri;
    }

    public function getLargeIconUri(): string
    {
        return $this->largeIconUri;
    }

    /**
     * @return array<string>
     */
    public function getExamplePhrases(): array
    {
        return $this->examplePhrases;
    }

    /**
     * @return array<string>
     */
    public function getKeywords(): array
    {
        return $this->keywords;
    }

    public function getUpdatesDescription(): ?string
    {
        return $this->updatesDescription;
    }
}
