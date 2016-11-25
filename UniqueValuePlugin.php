<?php
namespace Craft;

/**
 * Unique Value by Josh Angell
 *
 * @package   Unique Value
 * @author    Josh Angell
 * @copyright Copyright (c) 2014, Josh Angell
 * @link      http://www.joshangell.co.uk
 */

class UniqueValuePlugin extends BasePlugin
{

    public function getName()
    {
        return Craft::t('Unique Value');
    }

    public function getVersion()
    {
        return '1.2.1';
    }

    public function getDescription()
    {
        return 'Add uniqueValue field to craft';
    }

    public function getDeveloper()
    {
        return 'Josh Angell, forked by WHITE';
    }

    public function getDeveloperUrl()
    {
        return 'http://www.joshangell.co.uk';
    }

    public function getDocumentationUrl()
    {
        return 'https://github.com/WHITEdevelopment/craft-unique-value';
    }

    public function modifyEntryTableAttributes(&$attributes, $source)
    {
        if ($source == 'index')
        {
            // This will be the header name of the column, the <th>
            $attributes['UniqueValue'] = Craft::t('Unique Value');
        }
    }

    public function defineAdditionalEntryTableAttributes()
    {
        $additionalEntryTableAttributes = array();
        $allCustomFields = craft()->fields->getAllFields();

        foreach($allCustomFields as $customField) {
            if($customField->type == 'UniqueValue_UniqueValue') {
                $additionalEntryTableAttributes[$customField->handle] = $customField->name;
            }
        }

        return $additionalEntryTableAttributes;
    }
}
