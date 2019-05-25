<?php declare(strict_types=1);

namespace Omissis\AlexaSdk\Model\Skill\ManifestSchema\Manifest\PublishingInformation;

/*final */class Locale
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
     * @var null|string
     */
    private $summary;

    /**
     * A full description explaining the skill’s core functionality and any prerequisites to using it (such as additional hardware, software, or accounts). For a Flash Briefing skill, you must list the feeds for the skill.
     *
     * @var null|string
     */
    private $description;

    /**
     * URL to a small icon for the skill, which is shown in the list of skills. (108x108px)
     *
     * @var null|string
     */
    private $smallIconUri;

    /**
     * URL to a large icon that represents this skill. (512x512px)
     *
     * @var null|string
     */
    private $largeIconUri;

    /**
     * Three example phrases that illustrate how users can invoke your skill. For accuracy, these phrases must come directly from your sample utterances.
     *
     * @var null|string[]
     */
    private $examplePhrases;

    /**
     * Sample keyword phrases that describe the skill.
     *
     * @var null|string[]
     */
    private $keywords;

    /**
     * Description of the skill's new features and fixes in the version. Should describe changes in the revisions of the skill.
     *
     * @var null|string
     */
    private $updatesDescription;

    /**
     * @param null|string[] $examplePhrases
     * @param null|string[] $keywords
     */
    public function __construct(
        string $name,
        ?string $summary = null,
        ?string $description = null,
        ?string $smallIconUri = null,
        ?string $largeIconUri = null,
        ?array $examplePhrases = null,
        ?array $keywords = null,
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

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getSmallIconUri(): ?string
    {
        return $this->smallIconUri;
    }

    public function getLargeIconUri(): ?string
    {
        return $this->largeIconUri;
    }

    /**
     * @return null|string[]
     */
    public function getExamplePhrases(): ?array
    {
        return $this->examplePhrases;
    }

    /**
     * @return null|string[]
     */
    public function getKeywords(): ?array
    {
        return $this->keywords;
    }

    public function getUpdatesDescription(): ?string
    {
        return $this->updatesDescription;
    }
}
