<?php

namespace Google\Site_Kit_Dependencies;

/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */
class Google_Service_PeopleService_ListDirectoryPeopleResponse extends \Google\Site_Kit_Dependencies\Google_Collection
{
    protected $collection_key = 'people';
    public $nextPageToken;
    public $nextSyncToken;
    protected $peopleType = 'Google\Site_Kit_Dependencies\Google_Service_PeopleService_Person';
    protected $peopleDataType = 'array';
    public function setNextPageToken($nextPageToken)
    {
        $this->nextPageToken = $nextPageToken;
    }
    public function getNextPageToken()
    {
        return $this->nextPageToken;
    }
    public function setNextSyncToken($nextSyncToken)
    {
        $this->nextSyncToken = $nextSyncToken;
    }
    public function getNextSyncToken()
    {
        return $this->nextSyncToken;
    }
    /**
     * @param Google_Service_PeopleService_Person
     */
    public function setPeople($people)
    {
        $this->people = $people;
    }
    /**
     * @return Google_Service_PeopleService_Person
     */
    public function getPeople()
    {
        return $this->people;
    }
}
