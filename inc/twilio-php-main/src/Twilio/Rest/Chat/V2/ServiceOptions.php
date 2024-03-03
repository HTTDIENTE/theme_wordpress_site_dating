<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Chat\V2;

use Twilio\Options;
use Twilio\Values;

abstract class ServiceOptions {
	/**
	 * @param string $friendlyName A string to describe the resource
	 * @param string $defaultServiceRoleSid The service role assigned to users when
	 *                                      they are added to the service
	 * @param string $defaultChannelRoleSid The channel role assigned to users when
	 *                                      they are added to a channel
	 * @param string $defaultChannelCreatorRoleSid The channel role assigned to a
	 *                                             channel creator when they join a
	 *                                             new channel
	 * @param bool $readStatusEnabled Whether to enable the Message Consumption
	 *                                Horizon feature
	 * @param bool $reachabilityEnabled Whether to enable the Reachability
	 *                                  Indicator feature for this Service instance
	 * @param int $typingIndicatorTimeout How long in seconds to wait before
	 *                                    assuming the user is no longer typing
	 * @param int $consumptionReportInterval DEPRECATED
	 * @param bool $notificationsNewMessageEnabled Whether to send a notification
	 *                                             when a new message is added to a
	 *                                             channel
	 * @param string $notificationsNewMessageTemplate The template to use to create
	 *                                                the notification text
	 *                                                displayed when a new message
	 *                                                is added to a channel
	 * @param string $notificationsNewMessageSound The name of the sound to play
	 *                                             when a new message is added to a
	 *                                             channel
	 * @param bool $notificationsNewMessageBadgeCountEnabled Whether the new
	 *                                                       message badge is
	 *                                                       enabled
	 * @param bool $notificationsAddedToChannelEnabled Whether to send a
	 *                                                 notification when a member
	 *                                                 is added to a channel
	 * @param string $notificationsAddedToChannelTemplate The template to use to
	 *                                                    create the notification
	 *                                                    text displayed when a
	 *                                                    member is added to a
	 *                                                    channel
	 * @param string $notificationsAddedToChannelSound The name of the sound to
	 *                                                 play when a member is added
	 *                                                 to a channel
	 * @param bool $notificationsRemovedFromChannelEnabled Whether to send a
	 *                                                     notification to a user
	 *                                                     when they are removed
	 *                                                     from a channel
	 * @param string $notificationsRemovedFromChannelTemplate The template to use
	 *                                                        to create the
	 *                                                        notification text
	 *                                                        displayed to a user
	 *                                                        when they are removed
	 * @param string $notificationsRemovedFromChannelSound The name of the sound to
	 *                                                     play to a user when they
	 *                                                     are removed from a
	 *                                                     channel
	 * @param bool $notificationsInvitedToChannelEnabled Whether to send a
	 *                                                   notification when a user
	 *                                                   is invited to a channel
	 * @param string $notificationsInvitedToChannelTemplate The template to use to
	 *                                                      create the notification
	 *                                                      text displayed when a
	 *                                                      user is invited to a
	 *                                                      channel
	 * @param string $notificationsInvitedToChannelSound The name of the sound to
	 *                                                   play when a user is
	 *                                                   invited to a channel
	 * @param string $preWebhookUrl The webhook URL for pre-event webhooks
	 * @param string $postWebhookUrl The URL for post-event webhooks
	 * @param string $webhookMethod The HTTP method  to use for both PRE and POST
	 *                              webhooks
	 * @param string[] $webhookFilters The list of webhook events that are enabled
	 *                                 for this Service instance
	 * @param int $limitsChannelMembers The maximum number of Members that can be
	 *                                  added to Channels within this Service
	 * @param int $limitsUserChannels The maximum number of Channels Users can be a
	 *                                Member of within this Service
	 * @param string $mediaCompatibilityMessage The message to send when a media
	 *                                          message has no text
	 * @param int $preWebhookRetryCount Count of times webhook will be retried in
	 *                                  case of timeout or 429/503/504 HTTP
	 *                                  responses
	 * @param int $postWebhookRetryCount The number of times calls to the
	 *                                   `post_webhook_url` will be retried
	 * @param bool $notificationsLogEnabled Whether to log notifications
	 *
	 * @return UpdateServiceOptions Options builder
	 */
	public static function update(
		string $friendlyName = Values::NONE,
		string $defaultServiceRoleSid = Values::NONE,
		string $defaultChannelRoleSid = Values::NONE,
		string $defaultChannelCreatorRoleSid = Values::NONE,
		bool $readStatusEnabled = Values::NONE,
		bool $reachabilityEnabled = Values::NONE,
		int $typingIndicatorTimeout = Values::NONE,
		int $consumptionReportInterval = Values::NONE,
		bool $notificationsNewMessageEnabled = Values::NONE,
		string $notificationsNewMessageTemplate = Values::NONE,
		string $notificationsNewMessageSound = Values::NONE,
		bool $notificationsNewMessageBadgeCountEnabled = Values::NONE,
		bool $notificationsAddedToChannelEnabled = Values::NONE,
		string $notificationsAddedToChannelTemplate = Values::NONE,
		string $notificationsAddedToChannelSound = Values::NONE,
		bool $notificationsRemovedFromChannelEnabled = Values::NONE,
		string $notificationsRemovedFromChannelTemplate = Values::NONE,
		string $notificationsRemovedFromChannelSound = Values::NONE,
		bool $notificationsInvitedToChannelEnabled = Values::NONE,
		string $notificationsInvitedToChannelTemplate = Values::NONE,
		string $notificationsInvitedToChannelSound = Values::NONE,
		string $preWebhookUrl = Values::NONE,
		string $postWebhookUrl = Values::NONE,
		string $webhookMethod = Values::NONE,
		array $webhookFilters = Values::ARRAY_NONE,
		int $limitsChannelMembers = Values::NONE,
		int $limitsUserChannels = Values::NONE,
		string $mediaCompatibilityMessage = Values::NONE,
		int $preWebhookRetryCount = Values::NONE,
		int $postWebhookRetryCount = Values::NONE,
		bool $notificationsLogEnabled = Values::NONE
	): UpdateServiceOptions {
		return new UpdateServiceOptions( $friendlyName, $defaultServiceRoleSid, $defaultChannelRoleSid,
			$defaultChannelCreatorRoleSid, $readStatusEnabled, $reachabilityEnabled, $typingIndicatorTimeout,
			$consumptionReportInterval, $notificationsNewMessageEnabled, $notificationsNewMessageTemplate,
			$notificationsNewMessageSound, $notificationsNewMessageBadgeCountEnabled,
			$notificationsAddedToChannelEnabled, $notificationsAddedToChannelTemplate,
			$notificationsAddedToChannelSound, $notificationsRemovedFromChannelEnabled,
			$notificationsRemovedFromChannelTemplate, $notificationsRemovedFromChannelSound,
			$notificationsInvitedToChannelEnabled, $notificationsInvitedToChannelTemplate,
			$notificationsInvitedToChannelSound, $preWebhookUrl, $postWebhookUrl, $webhookMethod, $webhookFilters,
			$limitsChannelMembers, $limitsUserChannels, $mediaCompatibilityMessage, $preWebhookRetryCount,
			$postWebhookRetryCount, $notificationsLogEnabled );
	}
}

class UpdateServiceOptions extends Options {
	/**
	 * @param string $friendlyName A string to describe the resource
	 * @param string $defaultServiceRoleSid The service role assigned to users when
	 *                                      they are added to the service
	 * @param string $defaultChannelRoleSid The channel role assigned to users when
	 *                                      they are added to a channel
	 * @param string $defaultChannelCreatorRoleSid The channel role assigned to a
	 *                                             channel creator when they join a
	 *                                             new channel
	 * @param bool $readStatusEnabled Whether to enable the Message Consumption
	 *                                Horizon feature
	 * @param bool $reachabilityEnabled Whether to enable the Reachability
	 *                                  Indicator feature for this Service instance
	 * @param int $typingIndicatorTimeout How long in seconds to wait before
	 *                                    assuming the user is no longer typing
	 * @param int $consumptionReportInterval DEPRECATED
	 * @param bool $notificationsNewMessageEnabled Whether to send a notification
	 *                                             when a new message is added to a
	 *                                             channel
	 * @param string $notificationsNewMessageTemplate The template to use to create
	 *                                                the notification text
	 *                                                displayed when a new message
	 *                                                is added to a channel
	 * @param string $notificationsNewMessageSound The name of the sound to play
	 *                                             when a new message is added to a
	 *                                             channel
	 * @param bool $notificationsNewMessageBadgeCountEnabled Whether the new
	 *                                                       message badge is
	 *                                                       enabled
	 * @param bool $notificationsAddedToChannelEnabled Whether to send a
	 *                                                 notification when a member
	 *                                                 is added to a channel
	 * @param string $notificationsAddedToChannelTemplate The template to use to
	 *                                                    create the notification
	 *                                                    text displayed when a
	 *                                                    member is added to a
	 *                                                    channel
	 * @param string $notificationsAddedToChannelSound The name of the sound to
	 *                                                 play when a member is added
	 *                                                 to a channel
	 * @param bool $notificationsRemovedFromChannelEnabled Whether to send a
	 *                                                     notification to a user
	 *                                                     when they are removed
	 *                                                     from a channel
	 * @param string $notificationsRemovedFromChannelTemplate The template to use
	 *                                                        to create the
	 *                                                        notification text
	 *                                                        displayed to a user
	 *                                                        when they are removed
	 * @param string $notificationsRemovedFromChannelSound The name of the sound to
	 *                                                     play to a user when they
	 *                                                     are removed from a
	 *                                                     channel
	 * @param bool $notificationsInvitedToChannelEnabled Whether to send a
	 *                                                   notification when a user
	 *                                                   is invited to a channel
	 * @param string $notificationsInvitedToChannelTemplate The template to use to
	 *                                                      create the notification
	 *                                                      text displayed when a
	 *                                                      user is invited to a
	 *                                                      channel
	 * @param string $notificationsInvitedToChannelSound The name of the sound to
	 *                                                   play when a user is
	 *                                                   invited to a channel
	 * @param string $preWebhookUrl The webhook URL for pre-event webhooks
	 * @param string $postWebhookUrl The URL for post-event webhooks
	 * @param string $webhookMethod The HTTP method  to use for both PRE and POST
	 *                              webhooks
	 * @param string[] $webhookFilters The list of webhook events that are enabled
	 *                                 for this Service instance
	 * @param int $limitsChannelMembers The maximum number of Members that can be
	 *                                  added to Channels within this Service
	 * @param int $limitsUserChannels The maximum number of Channels Users can be a
	 *                                Member of within this Service
	 * @param string $mediaCompatibilityMessage The message to send when a media
	 *                                          message has no text
	 * @param int $preWebhookRetryCount Count of times webhook will be retried in
	 *                                  case of timeout or 429/503/504 HTTP
	 *                                  responses
	 * @param int $postWebhookRetryCount The number of times calls to the
	 *                                   `post_webhook_url` will be retried
	 * @param bool $notificationsLogEnabled Whether to log notifications
	 */
	public function __construct(
		string $friendlyName = Values::NONE,
		string $defaultServiceRoleSid = Values::NONE,
		string $defaultChannelRoleSid = Values::NONE,
		string $defaultChannelCreatorRoleSid = Values::NONE,
		bool $readStatusEnabled = Values::NONE,
		bool $reachabilityEnabled = Values::NONE,
		int $typingIndicatorTimeout = Values::NONE,
		int $consumptionReportInterval = Values::NONE,
		bool $notificationsNewMessageEnabled = Values::NONE,
		string $notificationsNewMessageTemplate = Values::NONE,
		string $notificationsNewMessageSound = Values::NONE,
		bool $notificationsNewMessageBadgeCountEnabled = Values::NONE,
		bool $notificationsAddedToChannelEnabled = Values::NONE,
		string $notificationsAddedToChannelTemplate = Values::NONE,
		string $notificationsAddedToChannelSound = Values::NONE,
		bool $notificationsRemovedFromChannelEnabled = Values::NONE,
		string $notificationsRemovedFromChannelTemplate = Values::NONE,
		string $notificationsRemovedFromChannelSound = Values::NONE,
		bool $notificationsInvitedToChannelEnabled = Values::NONE,
		string $notificationsInvitedToChannelTemplate = Values::NONE,
		string $notificationsInvitedToChannelSound = Values::NONE,
		string $preWebhookUrl = Values::NONE,
		string $postWebhookUrl = Values::NONE,
		string $webhookMethod = Values::NONE,
		array $webhookFilters = Values::ARRAY_NONE,
		int $limitsChannelMembers = Values::NONE,
		int $limitsUserChannels = Values::NONE,
		string $mediaCompatibilityMessage = Values::NONE,
		int $preWebhookRetryCount = Values::NONE,
		int $postWebhookRetryCount = Values::NONE,
		bool $notificationsLogEnabled = Values::NONE
	) {
		$this->options['friendlyName']                             = $friendlyName;
		$this->options['defaultServiceRoleSid']                    = $defaultServiceRoleSid;
		$this->options['defaultChannelRoleSid']                    = $defaultChannelRoleSid;
		$this->options['defaultChannelCreatorRoleSid']             = $defaultChannelCreatorRoleSid;
		$this->options['readStatusEnabled']                        = $readStatusEnabled;
		$this->options['reachabilityEnabled']                      = $reachabilityEnabled;
		$this->options['typingIndicatorTimeout']                   = $typingIndicatorTimeout;
		$this->options['consumptionReportInterval']                = $consumptionReportInterval;
		$this->options['notificationsNewMessageEnabled']           = $notificationsNewMessageEnabled;
		$this->options['notificationsNewMessageTemplate']          = $notificationsNewMessageTemplate;
		$this->options['notificationsNewMessageSound']             = $notificationsNewMessageSound;
		$this->options['notificationsNewMessageBadgeCountEnabled'] = $notificationsNewMessageBadgeCountEnabled;
		$this->options['notificationsAddedToChannelEnabled']       = $notificationsAddedToChannelEnabled;
		$this->options['notificationsAddedToChannelTemplate']      = $notificationsAddedToChannelTemplate;
		$this->options['notificationsAddedToChannelSound']         = $notificationsAddedToChannelSound;
		$this->options['notificationsRemovedFromChannelEnabled']   = $notificationsRemovedFromChannelEnabled;
		$this->options['notificationsRemovedFromChannelTemplate']  = $notificationsRemovedFromChannelTemplate;
		$this->options['notificationsRemovedFromChannelSound']     = $notificationsRemovedFromChannelSound;
		$this->options['notificationsInvitedToChannelEnabled']     = $notificationsInvitedToChannelEnabled;
		$this->options['notificationsInvitedToChannelTemplate']    = $notificationsInvitedToChannelTemplate;
		$this->options['notificationsInvitedToChannelSound']       = $notificationsInvitedToChannelSound;
		$this->options['preWebhookUrl']                            = $preWebhookUrl;
		$this->options['postWebhookUrl']                           = $postWebhookUrl;
		$this->options['webhookMethod']                            = $webhookMethod;
		$this->options['webhookFilters']                           = $webhookFilters;
		$this->options['limitsChannelMembers']                     = $limitsChannelMembers;
		$this->options['limitsUserChannels']                       = $limitsUserChannels;
		$this->options['mediaCompatibilityMessage']                = $mediaCompatibilityMessage;
		$this->options['preWebhookRetryCount']                     = $preWebhookRetryCount;
		$this->options['postWebhookRetryCount']                    = $postWebhookRetryCount;
		$this->options['notificationsLogEnabled']                  = $notificationsLogEnabled;
	}

	/**
	 * A descriptive string that you create to describe the resource.
	 *
	 * @param string $friendlyName A string to describe the resource
	 *
	 * @return $this Fluent Builder
	 */
	public function setFriendlyName( string $friendlyName ): self {
		$this->options['friendlyName'] = $friendlyName;

		return $this;
	}

	/**
	 * The service role assigned to users when they are added to the service. See the [Role resource](https://www.twilio.com/docs/chat/rest/role-resource) for more info about roles.
	 *
	 * @param string $defaultServiceRoleSid The service role assigned to users when
	 *                                      they are added to the service
	 *
	 * @return $this Fluent Builder
	 */
	public function setDefaultServiceRoleSid( string $defaultServiceRoleSid ): self {
		$this->options['defaultServiceRoleSid'] = $defaultServiceRoleSid;

		return $this;
	}

	/**
	 * The channel role assigned to users when they are added to a channel. See the [Role resource](https://www.twilio.com/docs/chat/rest/role-resource) for more info about roles.
	 *
	 * @param string $defaultChannelRoleSid The channel role assigned to users when
	 *                                      they are added to a channel
	 *
	 * @return $this Fluent Builder
	 */
	public function setDefaultChannelRoleSid( string $defaultChannelRoleSid ): self {
		$this->options['defaultChannelRoleSid'] = $defaultChannelRoleSid;

		return $this;
	}

	/**
	 * The channel role assigned to a channel creator when they join a new channel. See the [Role resource](https://www.twilio.com/docs/chat/rest/role-resource) for more info about roles.
	 *
	 * @param string $defaultChannelCreatorRoleSid The channel role assigned to a
	 *                                             channel creator when they join a
	 *                                             new channel
	 *
	 * @return $this Fluent Builder
	 */
	public function setDefaultChannelCreatorRoleSid( string $defaultChannelCreatorRoleSid ): self {
		$this->options['defaultChannelCreatorRoleSid'] = $defaultChannelCreatorRoleSid;

		return $this;
	}

	/**
	 * Whether to enable the [Message Consumption Horizon](https://www.twilio.com/docs/chat/consumption-horizon) feature. The default is `true`.
	 *
	 * @param bool $readStatusEnabled Whether to enable the Message Consumption
	 *                                Horizon feature
	 *
	 * @return $this Fluent Builder
	 */
	public function setReadStatusEnabled( bool $readStatusEnabled ): self {
		$this->options['readStatusEnabled'] = $readStatusEnabled;

		return $this;
	}

	/**
	 * Whether to enable the [Reachability Indicator](https://www.twilio.com/docs/chat/reachability-indicator) for this Service instance. The default is `false`.
	 *
	 * @param bool $reachabilityEnabled Whether to enable the Reachability
	 *                                  Indicator feature for this Service instance
	 *
	 * @return $this Fluent Builder
	 */
	public function setReachabilityEnabled( bool $reachabilityEnabled ): self {
		$this->options['reachabilityEnabled'] = $reachabilityEnabled;

		return $this;
	}

	/**
	 * How long in seconds after a `started typing` event until clients should assume that user is no longer typing, even if no `ended typing` message was received.  The default is 5 seconds.
	 *
	 * @param int $typingIndicatorTimeout How long in seconds to wait before
	 *                                    assuming the user is no longer typing
	 *
	 * @return $this Fluent Builder
	 */
	public function setTypingIndicatorTimeout( int $typingIndicatorTimeout ): self {
		$this->options['typingIndicatorTimeout'] = $typingIndicatorTimeout;

		return $this;
	}

	/**
	 * DEPRECATED. The interval in seconds between consumption reports submission batches from client endpoints.
	 *
	 * @param int $consumptionReportInterval DEPRECATED
	 *
	 * @return $this Fluent Builder
	 */
	public function setConsumptionReportInterval( int $consumptionReportInterval ): self {
		$this->options['consumptionReportInterval'] = $consumptionReportInterval;

		return $this;
	}

	/**
	 * Whether to send a notification when a new message is added to a channel. The default is `false`.
	 *
	 * @param bool $notificationsNewMessageEnabled Whether to send a notification
	 *                                             when a new message is added to a
	 *                                             channel
	 *
	 * @return $this Fluent Builder
	 */
	public function setNotificationsNewMessageEnabled( bool $notificationsNewMessageEnabled ): self {
		$this->options['notificationsNewMessageEnabled'] = $notificationsNewMessageEnabled;

		return $this;
	}

	/**
	 * The template to use to create the notification text displayed when a new message is added to a channel and `notifications.new_message.enabled` is `true`.
	 *
	 * @param string $notificationsNewMessageTemplate The template to use to create
	 *                                                the notification text
	 *                                                displayed when a new message
	 *                                                is added to a channel
	 *
	 * @return $this Fluent Builder
	 */
	public function setNotificationsNewMessageTemplate( string $notificationsNewMessageTemplate ): self {
		$this->options['notificationsNewMessageTemplate'] = $notificationsNewMessageTemplate;

		return $this;
	}

	/**
	 * The name of the sound to play when a new message is added to a channel and `notifications.new_message.enabled` is `true`.
	 *
	 * @param string $notificationsNewMessageSound The name of the sound to play
	 *                                             when a new message is added to a
	 *                                             channel
	 *
	 * @return $this Fluent Builder
	 */
	public function setNotificationsNewMessageSound( string $notificationsNewMessageSound ): self {
		$this->options['notificationsNewMessageSound'] = $notificationsNewMessageSound;

		return $this;
	}

	/**
	 * Whether the new message badge is enabled. The default is `false`.
	 *
	 * @param bool $notificationsNewMessageBadgeCountEnabled Whether the new
	 *                                                       message badge is
	 *                                                       enabled
	 *
	 * @return $this Fluent Builder
	 */
	public function setNotificationsNewMessageBadgeCountEnabled( bool $notificationsNewMessageBadgeCountEnabled
	): self {
		$this->options['notificationsNewMessageBadgeCountEnabled'] = $notificationsNewMessageBadgeCountEnabled;

		return $this;
	}

	/**
	 * Whether to send a notification when a member is added to a channel. The default is `false`.
	 *
	 * @param bool $notificationsAddedToChannelEnabled Whether to send a
	 *                                                 notification when a member
	 *                                                 is added to a channel
	 *
	 * @return $this Fluent Builder
	 */
	public function setNotificationsAddedToChannelEnabled( bool $notificationsAddedToChannelEnabled ): self {
		$this->options['notificationsAddedToChannelEnabled'] = $notificationsAddedToChannelEnabled;

		return $this;
	}

	/**
	 * The template to use to create the notification text displayed when a member is added to a channel and `notifications.added_to_channel.enabled` is `true`.
	 *
	 * @param string $notificationsAddedToChannelTemplate The template to use to
	 *                                                    create the notification
	 *                                                    text displayed when a
	 *                                                    member is added to a
	 *                                                    channel
	 *
	 * @return $this Fluent Builder
	 */
	public function setNotificationsAddedToChannelTemplate( string $notificationsAddedToChannelTemplate ): self {
		$this->options['notificationsAddedToChannelTemplate'] = $notificationsAddedToChannelTemplate;

		return $this;
	}

	/**
	 * The name of the sound to play when a member is added to a channel and `notifications.added_to_channel.enabled` is `true`.
	 *
	 * @param string $notificationsAddedToChannelSound The name of the sound to
	 *                                                 play when a member is added
	 *                                                 to a channel
	 *
	 * @return $this Fluent Builder
	 */
	public function setNotificationsAddedToChannelSound( string $notificationsAddedToChannelSound ): self {
		$this->options['notificationsAddedToChannelSound'] = $notificationsAddedToChannelSound;

		return $this;
	}

	/**
	 * Whether to send a notification to a user when they are removed from a channel. The default is `false`.
	 *
	 * @param bool $notificationsRemovedFromChannelEnabled Whether to send a
	 *                                                     notification to a user
	 *                                                     when they are removed
	 *                                                     from a channel
	 *
	 * @return $this Fluent Builder
	 */
	public function setNotificationsRemovedFromChannelEnabled( bool $notificationsRemovedFromChannelEnabled ): self {
		$this->options['notificationsRemovedFromChannelEnabled'] = $notificationsRemovedFromChannelEnabled;

		return $this;
	}

	/**
	 * The template to use to create the notification text displayed to a user when they are removed from a channel and `notifications.removed_from_channel.enabled` is `true`.
	 *
	 * @param string $notificationsRemovedFromChannelTemplate The template to use
	 *                                                        to create the
	 *                                                        notification text
	 *                                                        displayed to a user
	 *                                                        when they are removed
	 *
	 * @return $this Fluent Builder
	 */
	public function setNotificationsRemovedFromChannelTemplate( string $notificationsRemovedFromChannelTemplate
	): self {
		$this->options['notificationsRemovedFromChannelTemplate'] = $notificationsRemovedFromChannelTemplate;

		return $this;
	}

	/**
	 * The name of the sound to play to a user when they are removed from a channel and `notifications.removed_from_channel.enabled` is `true`.
	 *
	 * @param string $notificationsRemovedFromChannelSound The name of the sound to
	 *                                                     play to a user when they
	 *                                                     are removed from a
	 *                                                     channel
	 *
	 * @return $this Fluent Builder
	 */
	public function setNotificationsRemovedFromChannelSound( string $notificationsRemovedFromChannelSound ): self {
		$this->options['notificationsRemovedFromChannelSound'] = $notificationsRemovedFromChannelSound;

		return $this;
	}

	/**
	 * Whether to send a notification when a user is invited to a channel. The default is `false`.
	 *
	 * @param bool $notificationsInvitedToChannelEnabled Whether to send a
	 *                                                   notification when a user
	 *                                                   is invited to a channel
	 *
	 * @return $this Fluent Builder
	 */
	public function setNotificationsInvitedToChannelEnabled( bool $notificationsInvitedToChannelEnabled ): self {
		$this->options['notificationsInvitedToChannelEnabled'] = $notificationsInvitedToChannelEnabled;

		return $this;
	}

	/**
	 * The template to use to create the notification text displayed when a user is invited to a channel and `notifications.invited_to_channel.enabled` is `true`.
	 *
	 * @param string $notificationsInvitedToChannelTemplate The template to use to
	 *                                                      create the notification
	 *                                                      text displayed when a
	 *                                                      user is invited to a
	 *                                                      channel
	 *
	 * @return $this Fluent Builder
	 */
	public function setNotificationsInvitedToChannelTemplate( string $notificationsInvitedToChannelTemplate ): self {
		$this->options['notificationsInvitedToChannelTemplate'] = $notificationsInvitedToChannelTemplate;

		return $this;
	}

	/**
	 * The name of the sound to play when a user is invited to a channel and `notifications.invited_to_channel.enabled` is `true`.
	 *
	 * @param string $notificationsInvitedToChannelSound The name of the sound to
	 *                                                   play when a user is
	 *                                                   invited to a channel
	 *
	 * @return $this Fluent Builder
	 */
	public function setNotificationsInvitedToChannelSound( string $notificationsInvitedToChannelSound ): self {
		$this->options['notificationsInvitedToChannelSound'] = $notificationsInvitedToChannelSound;

		return $this;
	}

	/**
	 * The URL for pre-event webhooks, which are called by using the `webhook_method`. See [Webhook Events](https://www.twilio.com/docs/chat/webhook-events) for more details.
	 *
	 * @param string $preWebhookUrl The webhook URL for pre-event webhooks
	 *
	 * @return $this Fluent Builder
	 */
	public function setPreWebhookUrl( string $preWebhookUrl ): self {
		$this->options['preWebhookUrl'] = $preWebhookUrl;

		return $this;
	}

	/**
	 * The URL for post-event webhooks, which are called by using the `webhook_method`. See [Webhook Events](https://www.twilio.com/docs/chat/webhook-events) for more details.
	 *
	 * @param string $postWebhookUrl The URL for post-event webhooks
	 *
	 * @return $this Fluent Builder
	 */
	public function setPostWebhookUrl( string $postWebhookUrl ): self {
		$this->options['postWebhookUrl'] = $postWebhookUrl;

		return $this;
	}

	/**
	 * The HTTP method to use for calls to the `pre_webhook_url` and `post_webhook_url` webhooks.  Can be: `POST` or `GET` and the default is `POST`. See [Webhook Events](https://www.twilio.com/docs/chat/webhook-events) for more details.
	 *
	 * @param string $webhookMethod The HTTP method  to use for both PRE and POST
	 *                              webhooks
	 *
	 * @return $this Fluent Builder
	 */
	public function setWebhookMethod( string $webhookMethod ): self {
		$this->options['webhookMethod'] = $webhookMethod;

		return $this;
	}

	/**
	 * The list of webhook events that are enabled for this Service instance. See [Webhook Events](https://www.twilio.com/docs/chat/webhook-events) for more details.
	 *
	 * @param string[] $webhookFilters The list of webhook events that are enabled
	 *                                 for this Service instance
	 *
	 * @return $this Fluent Builder
	 */
	public function setWebhookFilters( array $webhookFilters ): self {
		$this->options['webhookFilters'] = $webhookFilters;

		return $this;
	}

	/**
	 * The maximum number of Members that can be added to Channels within this Service. Can be up to 1,000.
	 *
	 * @param int $limitsChannelMembers The maximum number of Members that can be
	 *                                  added to Channels within this Service
	 *
	 * @return $this Fluent Builder
	 */
	public function setLimitsChannelMembers( int $limitsChannelMembers ): self {
		$this->options['limitsChannelMembers'] = $limitsChannelMembers;

		return $this;
	}

	/**
	 * The maximum number of Channels Users can be a Member of within this Service. Can be up to 1,000.
	 *
	 * @param int $limitsUserChannels The maximum number of Channels Users can be a
	 *                                Member of within this Service
	 *
	 * @return $this Fluent Builder
	 */
	public function setLimitsUserChannels( int $limitsUserChannels ): self {
		$this->options['limitsUserChannels'] = $limitsUserChannels;

		return $this;
	}

	/**
	 * The message to send when a media message has no text. Can be used as placeholder message.
	 *
	 * @param string $mediaCompatibilityMessage The message to send when a media
	 *                                          message has no text
	 *
	 * @return $this Fluent Builder
	 */
	public function setMediaCompatibilityMessage( string $mediaCompatibilityMessage ): self {
		$this->options['mediaCompatibilityMessage'] = $mediaCompatibilityMessage;

		return $this;
	}

	/**
	 * The number of times to retry a call to the `pre_webhook_url` if the request times out (after 5 seconds) or it receives a 429, 503, or 504 HTTP response. Default retry count is 0 times, which means the call won't be retried.
	 *
	 * @param int $preWebhookRetryCount Count of times webhook will be retried in
	 *                                  case of timeout or 429/503/504 HTTP
	 *                                  responses
	 *
	 * @return $this Fluent Builder
	 */
	public function setPreWebhookRetryCount( int $preWebhookRetryCount ): self {
		$this->options['preWebhookRetryCount'] = $preWebhookRetryCount;

		return $this;
	}

	/**
	 * The number of times to retry a call to the `post_webhook_url` if the request times out (after 5 seconds) or it receives a 429, 503, or 504 HTTP response. The default is 0, which means the call won't be retried.
	 *
	 * @param int $postWebhookRetryCount The number of times calls to the
	 *                                   `post_webhook_url` will be retried
	 *
	 * @return $this Fluent Builder
	 */
	public function setPostWebhookRetryCount( int $postWebhookRetryCount ): self {
		$this->options['postWebhookRetryCount'] = $postWebhookRetryCount;

		return $this;
	}

	/**
	 * Whether to log notifications. The default is `false`.
	 *
	 * @param bool $notificationsLogEnabled Whether to log notifications
	 *
	 * @return $this Fluent Builder
	 */
	public function setNotificationsLogEnabled( bool $notificationsLogEnabled ): self {
		$this->options['notificationsLogEnabled'] = $notificationsLogEnabled;

		return $this;
	}

	/**
	 * Provide a friendly representation
	 *
	 * @return string Machine friendly representation
	 */
	public function __toString(): string {
		$options = \http_build_query( Values::of( $this->options ), '', ' ' );

		return '[Twilio.Chat.V2.UpdateServiceOptions ' . $options . ']';
	}
}
