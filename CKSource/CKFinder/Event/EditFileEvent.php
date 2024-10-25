<?php

/*
 * CKFinder
 * ========
 * https://ckeditor.com/ckfinder/
 * Copyright (c) 2007-2023, CKSource Holding sp. z o.o. All rights reserved.
 *
 * The software, this file and its contents are subject to the CKFinder
 * License. Please read the license.txt file before using, installing, copying,
 * modifying or distribute this file or part of its contents. The contents of
 * this file is part of the Source Code of CKFinder.
 */

namespace CKSource\CKFinder\Event;

use CKSource\CKFinder\CKFinder;
use CKSource\CKFinder\Filesystem\File\EditedFile;
use JetBrains\PhpStorm\{Deprecated, Pure};

/**
 * The EditFileEvent event class.
 */
class EditFileEvent extends CKFinderEvent
{
    protected string $newContents;

    /**
     * Constructor.
     * @param CKFinder $app The CKFinder instance.
     */
    #[Pure]
    public function __construct(CKFinder $app, protected EditedFile $editedFile)
    {
        parent::__construct($app);
    }

    /**
     * Returns the edited file object.
     */
    #[Deprecated('please use getFile() instead', '%class%->getFile()')]
    public function getEditedFile(): EditedFile
    {
        return $this->editedFile;
    }

    /**
     * Returns the edited file object.
     */
    public function getFile(): EditedFile
    {
        return $this->editedFile;
    }

    /**
     * Returns new contents of the edited file.
     */
    #[Pure]
    public function getNewContents(): string
    {
        return $this->editedFile->getNewContents();
    }

    /**
     * Sets new contents for the edited file.
     */
    public function setNewContents(string $newContents): void
    {
        $this->editedFile->setNewContents($newContents);
    }
}
