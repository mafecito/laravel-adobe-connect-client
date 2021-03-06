<?php

namespace Soheilrt\AdobeConnectClient\Client\Entities;

use DomainException;
use Soheilrt\AdobeConnectClient\Client\Contracts\ArrayableInterface;
use Soheilrt\AdobeConnectClient\Client\Helpers\StringCaseTransform as SCT;
use Soheilrt\AdobeConnectClient\Client\Helpers\ValueTransform as VT;
use Soheilrt\AdobeConnectClient\Client\Traits\Fillable;
use Soheilrt\AdobeConnectClient\Client\Traits\PropertyCaller;

/**
 * Adobe Connect Principal.
 *
 * See {@link https://helpx.adobe.com/adobe-connect/webservices/common-xml-elements-attributes.html#type}
 *
 * @property int|string|mixed  $name
 * @property int|string|mixed  $display_uid
 * @property int|string|mixed  $principal_id
 * @property int|string|mixed  $training_group_id
 * @property int|string|mixed  $account_id
 * @property string|mixed      $login
 * @property string|mixed      $type          See {@link https://helpx.adobe.com/adobe-connect/webservices/common-xml-elements-attributes.html#type}
 * @property string|mixed      $permission_id @see Permission::PRINCIPAL_* constants
 * @property string|mixed      $description   The new group’s description. Use only when creating a new group.
 * @property string|mixed      $email         Only for user
 * @property string|mixed      $first_name    Only for user
 * @property string|mixed      $last_name     Only for user
 * @property string|mixed      $password      Only on create a user
 * @property bool|string|mixed $is_primary
 * @property bool|string|mixed $has_children  On create: If the principal is a group, use true. If the principal is a user, use false.
 * @property bool|string|mixed $is_ecommerece
 * @property bool|string|mixed $is_hidden
 * @property bool|string|mixed $disabled
 * @property bool|string|mixed $send_email    only on create a user
 * @property bool|string|mixed $is_member     only on create a user . Indicates if the user is a member of the group (@see \AdobeConnectClient\Commands\PrincipalList)
 *
 *
 * @method  Principal setDisplayId($value)
 * @method  Principal setPrincipalId($value)
 * @method  Principal setTrainingGroupId($value)
 * @method  Principal setAccountId($value)
 * @method  Principal setLogin($value)
 * @method  Principal setPermissionId($value) @see Permission::PRINCIPAL_* constants
 * @method  Principal setDescription($value)  The new group’s description. Use only when creating a new group.
 * @method  Principal setEmail($value) Only for user
 * @method  Principal setPassword($value) Only on create a user
 * @method  Principal setIsEcommerece($value)
 *
 * @method int|string|mixed getName()
 * @method int|string|mixed getDisplayUid()
 * @method int|string|mixed getPrincipalId()
 * @method int|string|mixed getTrainingGroupId()
 * @method int|string|mixed getAccountId()
 * @method string|mixed|null getLogin()
 * @method string|mixed|null getType() See {
 * @link https://helpx.adobe.com/adobe-connect/webservices/common-xml-elements-attributes.html#type}
 * @method string|mixed|null getPermissionId() @see Permission::PRINCIPAL_* constants
 * @method string|mixed|null getDescription() The new group’s description. Use only when creating a new group.
 * @method string|mixed|null getEmail() Only for user
 * @method string|mixed|null getFirstName() Only for user
 * @method string|mixed|null getLastName() Only for user
 * @method string|mixed|null getPassword() Only on create a user
 * @method bool|string|mixed|null getIsPrimary()
 * @method bool|string|mixed|null getHasChildren() On create: If the principal is a group, use true. If the principal is a user, use false.
 * @method bool|string|mixed|null getIsEcommerece()
 * @method bool|string|mixed|null getIsHidden()
 * @method bool|string|mixed|null getDisabled()
 * @method bool|string|mixed|null getSendEmail()  only on create a user
 * @method bool|string|mixed|null getIsMember() only on create a user . Indicates if the user is a member of the group (@see \AdobeConnectClient\Commands\PrincipalList)
 *
 * @todo Maybe a factory for the differents types?
 */
class Principal implements ArrayableInterface
{
    use PropertyCaller, Fillable;

    /**
     * The built-in group Administrators, for Adobe Connect server Administrators.
     *
     * @var string
     */
    public const TYPE_ADMINS = 'admins';

    /**
     * The built-in group Administrators, for Adobe Connect server Administrators.
     *
     * @var string
     */
    public const TYPE_ADMINS_LIMITED = 'admins-limited';

    /**
     * The built-in group Authors, for authors.
     *
     * @var string
     */
    public const TYPE_AUTHORS = 'authors';

    /**
     * The built-in group Training Managers, for training managers.
     *
     * @var string
     */
    public const TYPE_COURSE_ADMINS = 'course-admins';

    /**
     * The built-in group Event Managers, for anyone who can create an Adobe Connect meeting.
     *
     * @var string
     */
    public const TYPE_EVENT_ADMINS = 'event-admins';

    /**
     * The Event Supper Admins
     *
     * @var string
     */
    public const TYPE_EVENT_SUPER_ADMINS = 'event-super-admins';

    /**
     * Virtual Classroom admins
     *
     * @var string
     */
    public const TYPE_NAMED_VIRTUAL_CLASSROM_ADMINS = 'named-vc-admins';

    /**
     * The group of users invited to an event.
     *
     * @var string
     */
    public const TYPE_EVENT_GROUP = 'event-group';

    /**
     * All Adobe Connect users.
     *
     * @var string
     */
    public const TYPE_EVERYONE = 'everyone';

    /**
     * A group authenticated from an external network.
     *
     * @var string
     */
    public const TYPE_EXTERNAL_GROUP = 'external-group';

    /**
     * A user authenticated from an external network.
     *
     * @var string
     */
    public const TYPE_EXTERNAL_USER = 'external-user';

    /**
     * A group that a user or Administrator creates.
     *
     * @var string
     */
    public const TYPE_GROUP = 'group';

    /**
     * A non-registered user who enters an Adobe Connect meeting room.
     *
     * @var string
     */
    public const TYPE_GUEST = 'guest';

    /**
     * The built-in group learners, for users who take courses.
     *
     * @var string
     */
    public const TYPE_LEARNERS = 'learners';

    /**
     * The built-in group Meeting Hosts, for Adobe Connect meeting hosts.
     *
     * @var string
     */
    public const TYPE_LIVE_ADMINS = 'live-admins';

    /**
     * The built-in group Seminar Hosts, for seminar hosts.
     *
     * @var string
     */
    public const TYPE_SEMINAR_ADMINS = 'seminar-admins';

    /**
     * A registered user on the server.
     *
     * @var string
     */
    public const TYPE_USER = 'user';

    /**
     * Returns a new Principal instance.
     *
     * @return Principal
     */
    public static function instance(): Principal
    {
        return new static();
    }

    /**
     * Retrieves all not null attributes in an associative array.
     *
     * @return string[] [string => string]
     *
     * @todo Returns fields for all types
     */
    public function toArray(): array
    {
        $parameters = [];

        switch ($this->type) {
            case self::TYPE_USER:
                $fields = $this->fieldsForUser();
                break;

            case self::TYPE_GROUP:
                $fields = $this->fieldsForGroup();
                break;

            default:
                $fields = [];
        }

        foreach ($fields as $field) {
            $value = $this->$field;

            if (isset($value)) {
                $parameters[SCT::toHyphen($field)] = VT::toString($value);
            }
        }

        return $parameters;
    }

    /**
     * The fields for create/update a User.
     *
     * @return string[]
     */
    protected function fieldsForUser(): array
    {
        return [
            'hasChildren',
            'principalId',
            'firstName',
            'lastName',
            'login',
            'password',
            'email',
            'sendEmail',
            'type',
        ];
    }

    /**
     * The fields for create/update a Group.
     *
     * @return string[]
     */
    protected function fieldsForGroup(): array
    {
        return [
            'hasChildren',
            'principalId',
            'name',
            'description',
            'type',
        ];
    }

    /**
     * @param string $name
     *
     * @return Principal
     */
    public function setName($name): Principal
    {
        $this->attributes['name'] = (string) $name;
        $this->fixNameByType();

        return $this;
    }

    /**
     * Fix the name or firstName and lastName.
     *
     * The user type has firstName and lastName, but some actions from Adobe Connect returns the
     * Principal user type with name, so we need fix it.
     */
    protected function fixNameByType(): void
    {
        if (
            $this->type === self::TYPE_GROUP &&
            !isset($this->attributes['name']) &&
            isset($this->attributes['firstName'], $this->attributes['lastName'])
        ) {
            $this->attributes['name'] = $this->attributes['firstName'] . ' ' . $this->attributes['lastName'];
            return;
        }

        if (
            $this->type === self::TYPE_USER &&
            empty($this->attributes['firstName']) &&
            empty($this->attributes['lastName']) &&
            isset($this->attributes['name'])
        ) {
            $names = explode(' ', $this->name, 2);

            if (count($names) !== 2) {
                $this->first_name = $names[0];

                return;
            }

            [$this->attributes['firstName'], $this->attributes['lastName']] = $names;
        }
    }

    /**
     * @param bool $isPrimary
     *
     * @return Principal
     */
    public function setIsPrimary($isPrimary): Principal
    {
        $this->attributes['isPrimary'] = VT::toBool($isPrimary);

        return $this;
    }

    /**
     * Set the Principal type.
     *
     * More info about types see {@link https://helpx.adobe.com/adobe-connect/webservices/common-xml-elements-attributes.html#type}
     *
     * @param string $type
     *
     * @throws DomainException
     *
     * @return Principal
     */
    public function setType($type): Principal
    {
        $this->attributes['type'] = (string) $type;

        if (!in_array(
            $this->attributes['type'],
            [
                self::TYPE_ADMINS,
                self::TYPE_ADMINS_LIMITED,
                self::TYPE_AUTHORS,
                self::TYPE_COURSE_ADMINS,
                self::TYPE_EVENT_ADMINS,
                self::TYPE_EVENT_SUPER_ADMINS,
                self::TYPE_NAMED_VIRTUAL_CLASSROM_ADMINS,
                self::TYPE_EVENT_GROUP,
                self::TYPE_EVERYONE,
                self::TYPE_EXTERNAL_GROUP,
                self::TYPE_EXTERNAL_USER,
                self::TYPE_GROUP,
                self::TYPE_GUEST,
                self::TYPE_LEARNERS,
                self::TYPE_LIVE_ADMINS,
                self::TYPE_SEMINAR_ADMINS,
                self::TYPE_USER,
            ]
        )) {
            throw new DomainException("{$type} isn't a valid Principal Type");
        }

        $this->fixNameByType();

        return $this;
    }

    /**
     * @param bool $hasChildren
     *
     * @return Principal
     */
    public function setHasChildren($hasChildren): Principal
    {
        $this->attributes['hasChildren'] = VT::toBool($hasChildren);

        return $this;
    }

    /**
     * @param bool $isEcommerce
     *
     * @return Principal
     */
    public function setIsEcommerce($isEcommerce): Principal
    {
        $this->attributes['isEcommerce'] = VT::toBool($isEcommerce);

        return $this;
    }

    /**
     * @param bool $isHidden
     *
     * @return Principal
     */
    public function setIsHidden($isHidden): Principal
    {
        $this->attributes['isHidden'] = VT::toBool($isHidden);

        return $this;
    }

    /**
     * @param bool $disabled
     *
     * @return Principal
     */
    public function setDisabled($disabled): Principal
    {
        $this->attributes['disabled'] = VT::toBool($disabled);

        return $this;
    }

    /**
     * @param string $firstName
     *
     * @return Principal
     */
    public function setFirstName($firstName): Principal
    {
        $this->attributes['firstName'] = (string) $firstName;
        $this->fixNameByType();

        return $this;
    }

    /**
     * @param string $lastName
     *
     * @return Principal
     */
    public function setLastName($lastName): Principal
    {
        $this->attributes['lastName'] = (string) $lastName;
        $this->fixNameByType();

        return $this;
    }

    /**
     * @param bool $sendEmail
     *
     * @return Principal
     */
    public function setSendEmail($sendEmail): Principal
    {
        $this->attributes['sendEmail'] = VT::toBool($sendEmail);

        return $this;
    }

    /**
     * @param bool $isMember
     *
     * @return Principal
     */
    public function setIsMember($isMember): Principal
    {
        $this->attributes['isMember'] = VT::toBool($isMember);

        return $this;
    }
}
