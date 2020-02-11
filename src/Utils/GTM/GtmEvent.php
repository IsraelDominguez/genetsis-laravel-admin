<?php namespace Genetsis\Admin\Utils\GTM;

class GtmEvent
{
    /**
     * @var string category event
     */
    protected $category;

    /**
     * @var string action event
     */
    protected $action;

    /**
     * @var string label event
     */
    protected $label;

    /**
     * @var string oid event Dimension 1
     */
    protected $oid;

    /**
     * /promociones/winners
     * @var string Document Path
     */
    protected $document_path = '';

    /**
     * Promociones Sevilla - Winners
     * @var string Document Title
     */
    protected $document_title = '';

    /**
     * @var string Host name
     */
    protected $host_name = '';

    /**
     * GtmEvent constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return GtmEvent
     */
    public function setCategory(string $category): GtmEvent
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string $action
     * @return GtmEvent
     */
    public function setAction(string $action): GtmEvent
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return GtmEvent
     */
    public function setLabel(string $label): GtmEvent
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return string
     */
    public function getOid(): string
    {
        return $this->oid;
    }

    /**
     * @param string $oid
     * @return GtmEvent
     */
    public function setOid(string $oid): GtmEvent
    {
        $this->oid = $oid;
        return $this;
    }

    /**
     * @return string
     */
    public function getDocumentPath(): string
    {
        return $this->document_path;
    }

    /**
     * @param string $document_path
     * @return GtmEvent
     */
    public function setDocumentPath(string $document_path): GtmEvent
    {
        $this->document_path = $document_path;
        return $this;
    }

    /**
     * @return string
     */
    public function getDocumentTitle(): string
    {
        return $this->document_title;
    }

    /**
     * @param string $document_title
     * @return GtmEvent
     */
    public function setDocumentTitle(string $document_title): GtmEvent
    {
        $this->document_title = $document_title;
        return $this;
    }

    /**
     * @return string
     */
    public function getHostName(): string
    {
        return $this->host_name;
    }

    /**
     * @param string $host_name
     * @return GtmEvent
     */
    public function setHostName(string $host_name): GtmEvent
    {
        $this->host_name = $host_name;
        return $this;
    }

}
