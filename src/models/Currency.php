<?php
namespace pastuhov\ymlcatalog\models;

class Currency extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static $tag = 'currency';

    /**
     * @inheritdoc
     */
    public static $tagProperties = [
        'id',
        'rate',
        'plus',
    ];

    public $id;
    public $rate;
    public $plus;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'id',
                    'rate',
                ],
                'required',
            ],
            [
                [
                    'rate',
                ],
                'string',
                'max' => 5,
            ],
            [
                [
                    'id',
                ],
                'string',
                'max' => 3,
            ],
            [
                [
                    'plus',
                ],
                'integer',
            ],
            [
                [
                    'id',
                ],
                'in',
                'range' => [
                    'RUR',
                    'RUB',
                    'UAH',
                    'BYR',
                    'KZT',
                    'USD',
                    'EUR'
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    protected function getYmlBody()
    {
        return null;
    }
    
    /**
     * @return string
     */
    protected function getYmlEndTag()
    {
        return '';
    }

    /**
     * @return string
     */
    protected function getYmlStartTag()
    {
        $string = '';
        if (static::$tag) {
            $string = '<' . static::$tag . $this->getYmlTagProperties() . ' />';
        }

        return $string;
    }
}
