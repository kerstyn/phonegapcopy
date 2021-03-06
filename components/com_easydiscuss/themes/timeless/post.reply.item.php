<?php
/**
 * @package		EasyDiscuss
 * @copyright	Copyright (C) 2010 Stack Ideas Private Limited. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 *
 * EasyDiscuss is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */
defined('_JEXEC') or die('Restricted access');
?>
<a name="<?php echo JText::_('COM_EASYDISCUSS_REPLY_PERMALINK') . '-' . $post->id;?>"></a>
<div id="dc_reply_<?php echo $post->id;?>" class="discuss-item discussReplyItem mt-10<?php echo $post->islock ? ' is-locked' : '';?><?php echo $post->minimize ? ' is-minimized' : '';?><?php echo $post->isPollLocked() ? ' is-poll-lock' : '';?>" data-id="<?php echo $post->id;?>">

	<div class="discuss-item-hd">
		<h2 class="discuss-post-title">
			<?php echo JText::_('COM_EASYDISCUSS_ENTRY_ACCEPTED_ANSWER'); ?>
		</h2>
	</div>
	<!-- Discussion left side bar -->
	<div class="discuss-item-left discuss-user discuss-user-role-<?php echo $post->getOwner()->roleid; ?>">


		<a href="<?php echo $post->getOwner()->link;?>">
			<?php if ($system->config->get( 'layout_avatar' ) && $system->config->get( 'layout_avatar_in_post' )) { ?>
				<div class="discuss-avatar avatar-medium <?php echo $post->getOwner()->rolelabel; ?>">
					<img src="<?php echo $post->getOwner()->avatar;?>" alt="<?php echo $this->escape( $post->getOwner()->name );?>" />

				</div>
			<?php } ?>

		</a>

		<?php if( empty( $post->user_id ) ) { ?>
			<span class="fs-11">
				<?php echo $post->poster_name; ?>
			</span>
		<?php } else { ?>
			<?php echo $this->loadTemplate( 'ranks.php' , array( 'userId' => $post->getOwner()->id ) ); ?>

		<?php } ?>

		<div class="discuss-role-title"><?php echo $this->escape($post->getOwner()->role); ?></div>

		<?php echo $this->loadTemplate( 'post.conversation.php' , array( 'userId' => $post->getOwner()->id ) ); ?>
	</div>

	<!-- Discussion content area -->
	<div class="discuss-item-right">

		<div class="discuss-story">
		<!-- MODIFIED BY KERSTYN -->
			<div class="discuss-story-bd mb-10 replyText">

				<div class="ph-10">

					<div class="discuss-editor"></div>

					<div class="discuss-content">
						<?php if( $system->config->get( 'main_allowvote' ) ){ ?>
						<?php echo $this->loadTemplate( 'post.vote.php' , array( 'access' => $post->access , 'post' => $post ) ); ?>
						<?php } ?>
<!-- MODIFIED BY KERSTYN -->
						<h3 class="discuss-content-item">
							<?php echo $post->content; ?>
						</h3>

					</div>
					<!-- MODIFIED BY KERSTYN - moved .span5 from .pl-5 -->
					<div class="span5">


							<div class="discuss-user-name fs-11">
								<?php echo JText::_('COM_EASYDISCUSS_BY'); ?>
								<a class="" href="<?php echo $post->getOwner()->link;?>">
									<strong>
										<?php if( !$post->user_id ){ ?>
											<?php echo $post->poster_name; ?>
										<?php } else { ?>
											<?php echo $post->getOwner()->name;?>
										<?php } ?>
									</strong>
								</a>
							</div>
					</div>

					<!-- polls -->
					<?php echo $this->getFieldHTML( true , $post ); ?>


					<?php echo $this->loadTemplate( 'post.customfields.php', array( 'post' => $post ) ); ?>

					<div class="discuss-users-action row-fluid mb-10">
						<?php echo $this->loadTemplate( 'post.likes.php' , array( 'post' => $post ) ); ?>
					</div>

					<div class="discuss-users-action row-fluid">
						<?php echo $this->loadTemplate( 'post.comments.php' , array( 'reply' => $post, 'question' => $question  ) ); ?>
						<?php echo $this->loadTemplate( 'post.qna.php' , array( 'reply' => $post, 'question' => $question ) ); ?>
					</div>

					<?php echo $this->loadTemplate( 'post.reply.comments.php' , array( 'post' => $post ) ); ?>

					<?php echo $this->loadTemplate( 'post.location.php' , array( 'post' => $post ) ); ?>
				</div>
				
			</div>
		
		
		
			<div class="discuss-story-hd">
				<div class="pl-5">
					<div class="row-fluid">
					
<!-- MODIFIED BY KERSTYN, remove this div							
						<div class="span5">
							<div class="discuss-user-name fs-11">
								<?php echo JText::_('COM_EASYDISCUSS_BY'); ?>
								<a class="" href="<?php echo $post->getOwner()->link;?>">
									<strong>
										<?php if( !$post->user_id ){ ?>
											<?php echo $post->poster_name; ?>
										<?php } else { ?>
											<?php echo $post->getOwner()->name;?>
										<?php } ?>
									</strong>
								</a>
							</div>
							<div class="discuss-action-options-1 fs-11">

								<div class="discuss-clock">
									<?php echo $this->formatDate( $system->config->get('layout_dateformat', '%A, %B %d %Y, %I:%M %p') , $post->created);?> -
									<a href="<?php echo DiscussRouter::getPostRoute( $post->parent_id ) . '#' . JText::_('COM_EASYDISCUSS_REPLY_PERMALINK') . '-' . $post->id;?>" title="<?php echo JText::_('COM_EASYDISCUSS_REPLY_PERMALINK_TO'); ?>">#<?php echo JText::_( 'COM_EASYDISCUSS_POST_PERMALINK' );?></a>
								</div>

								<div class="pull-right mr-10">
									<?php echo $this->loadTemplate( 'post.report.php' , array( 'post' => $post ) ); ?>
								</div>
							</div>

						</div>
-->						
						
<!-- MODIFIED BY KERSTYN - remove div		
						<div class="">
							<?php echo $this->loadTemplate( 'post.actions.php' , array( 'access' => $post->access , 'post' => $post ) ); ?>
						</div>
-->						
						
					</div>
				</div>


			</div>
			
			
			<!-- MODIFIED BY KERSTYN - moved mb-10 div above-->
			
			<!-- <hr /> -->
			<?php echo $this->loadTemplate( 'post.signature.php' , array( 'signature' => $post->getOwner()->signature ) ); ?>

<!-- MODIFIED BY KERSTYN - removed div

			<div class="discuss-anchor">
				<a class="pull-right" href="#<?php echo JText::_( 'COM_EASYDISCUSS_TOP_ANCHOR' , true );?>" title="<?php echo JText::_( 'COM_EASYDISCUSS_BACK_TO_TOP' , true );?>"><i class="icon-circle-arrow-up"></i></a>
			</div>
-->			
			
		</div>

		<!-- @php when .discuss-story minimize show out -->
		<div id="reply_minimize_msg_5" class="discuss-reply-minimized">
			<b><?php echo JText::_( 'COM_EASYDISCUSS_REPLY_CURRENTLY_MINIMIZED');?></b>
			<a href="javascript:void(0);" class="btn btn-small" onclick="discuss.reply.maximize('<?php echo $post->id;?>');">Show</a>
		</div>

	</div>

</div>