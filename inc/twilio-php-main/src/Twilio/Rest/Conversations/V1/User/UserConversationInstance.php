<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Conversations\V1\User;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $accountSid
 * @property string $chatServiceSid
 * @property string $conversationSid
 * @property int $unreadMessagesCount
 * @property int $lastReadMessageIndex
 * @property string $participantSid
 * @property string $userSid
 * @property string $friendlyName
 * @property string $conversationState
 * @property array $timers
 * @property string $attributes
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $createdBy
 * @property string $notificationLevel
 * @property string $uniqueName
 * @property string $url
 * @property array $links
 */
class UserConversationInstance extends InstanceResource {
	/**
	 * Initialize the UserConversationInstance
	 *
	 * @param Version $version Version that contains the resource
	 * @param mixed[] $payload The response payload
	 * @param string $userSid The unique ID for the User.
	 * @param string $conversationSid The unique SID identifier of the Conversation.
	 */
	public function __construct( Version $version, array $payload, string $userSid, string $conversationSid = null ) {
		parent::__construct( $version );

		// Marshaled Properties
		$this->properties = [
			'accountSid'           => Values::array_get( $payload, 'account_sid' ),
			'chatServiceSid'       => Values::array_get( $payload, 'chat_service_sid' ),
			'conversationSid'      => Values::array_get( $payload, 'conversation_sid' ),
			'unreadMessagesCount'  => Values::array_get( $payload, 'unread_messages_count' ),
			'lastReadMessageIndex' => Values::array_get( $payload, 'last_read_message_index' ),
			'participantSid'       => Values::array_get( $payload, 'participant_sid' ),
			'userSid'              => Values::array_get( $payload, 'user_sid' ),
			'friendlyName'         => Values::array_get( $payload, 'friendly_name' ),
			'conversationState'    => Values::array_get( $payload, 'conversation_state' ),
			'timers'               => Values::array_get( $payload, 'timers' ),
			'attributes'           => Values::array_get( $payload, 'attributes' ),
			'dateCreated'          => Deserialize::dateTime( Values::array_get( $payload, 'date_created' ) ),
			'dateUpdated'          => Deserialize::dateTime( Values::array_get( $payload, 'date_updated' ) ),
			'createdBy'            => Values::array_get( $payload, 'created_by' ),
			'notificationLevel'    => Values::array_get( $payload, 'notification_level' ),
			'uniqueName'           => Values::array_get( $payload, 'unique_name' ),
			'url'                  => Values::array_get( $payload, 'url' ),
			'links'                => Values::array_get( $payload, 'links' ),
		];

		$this->solution = [
			'userSid'         => $userSid,
			'conversationSid' => $conversationSid ?: $this->properties['conversationSid'],
		];
	}

	/**
	 * Generate an instance context for the instance, the context is capable of
	 * performing various actions.  All instance actions are proxied to the context
	 *
	 * @return UserConversationContext Context for this UserConversationInstance
	 */
	protected function proxy(): UserConversationContext {
		if ( ! $this->context ) {
			$this->context = new UserConversationContext(
				$this->version,
				$this->solution['userSid'],
				$this->solution['conversationSid']
			);
		}

		return $this->context;
	}

	/**
	 * Update the UserConversationInstance
	 *
	 * @param array|Options $options Optional Arguments
	 *
	 * @return UserConversationInstance Updated UserConversationInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function update( array $options = [] ): UserConversationInstance {
		return $this->proxy()->update( $options );
	}

	/**
	 * Delete the UserConversationInstance
	 *
	 * @return bool True if delete succeeds, false otherwise
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function delete(): bool {
		return $this->proxy()->delete();
	}

	/**
	 * Fetch the UserConversationInstance
	 *
	 * @return UserConversationInstance Fetched UserConversationInstance
	 * @throws TwilioException When an HTTP error occurs.
	 */
	public function fetch(): UserConversationInstance {
		return $this->proxy()->fetch();
	}

	/**
	 * Magic getter to access properties
	 *
	 * @param string $name Property to access
	 *
	 * @return mixed The requested property
	 * @throws TwilioException For unknown properties
	 */
	public function __get( string $name ) {
		if ( \array_key_exists( $name, $this->properties ) ) {
			return $this->properties[ $name ];
		}

		if ( \property_exists( $this, '_' . $name ) ) {
			$method = 'get' . \ucfirst( $name );

			return $this->$method();
		}

		throw new TwilioException( 'Unknown property: ' . $name );
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		$context = [];
		foreach ( $this->solution as $key => $value ) {
			$context[] = "$key=$value";
		}

		return '[Twilio.Conversations.V1.UserConversationInstance ' . \implode( ' ', $context ) . ']';
	}
}
