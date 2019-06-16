<?php
/**
 * The template for the gallery
 *
 * @package immerge_demo
 */

get_header();
?>

	<div class="gallery">
    	<div class="modal">
        	<div class="modal__header">
            	<div class="modal__title"></div>
                	<div class="modal__close">CLOSE</div>
                </div>
            </div>
			
		<?php $images = get_field('images'); ?>
		<?php if( $images ): ?>
				<?php foreach( $images as $image ): ?>
		
					<div class="gallery__item__container">
						<div
							class="gallery__item"
							data-type="bg"
							data-src="<?php echo $image['url']; ?>"
							data-alt="<?php echo $image['alt']; ?>">
							<div class="gallery__item__icon">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22"><defs><clipPath><rect width="32" height="32" x="392.57" y="507.8" fill="none" rx="16"/></clipPath><clipPath><path d="m69.63 12.145h-.052c-22.727-.292-46.47 4.077-46.709 4.122-2.424.451-4.946 2.974-5.397 5.397-.044.237-4.414 23.983-4.122 46.71-.292 22.777 4.078 46.523 4.122 46.761.451 2.423 2.974 4.945 5.398 5.398.237.044 23.982 4.413 46.709 4.121 22.779.292 46.524-4.077 46.761-4.121 2.423-.452 4.946-2.976 5.398-5.399.044-.236 4.413-23.981 4.121-46.709.292-22.777-4.077-46.523-4.121-46.761-.453-2.423-2.976-4.946-5.398-5.397-.238-.045-23.984-4.414-46.71-4.122"/></clipPath><clipPath><rect width="32" height="32" x="8" y="8" fill="none" rx="16"/></clipPath><clipPath><rect width="32" height="32" x="392.57" y="507.8" fill="none" rx="16"/></clipPath><clipPath><rect width="32" height="32" x="392.57" y="507.8" fill="none" rx="16"/></clipPath><clipPath><rect width="32" height="32" x="392.57" y="507.8" fill="none" rx="16"/></clipPath><clipPath><rect y="507.8" x="392.57" height="32" width="32" fill="none" rx="16"/></clipPath><clipPath><rect width="32" height="32" x="392.57" y="507.8" fill="none" rx="16"/></clipPath><clipPath><rect y="507.8" x="392.57" height="32" width="32" fill="none" rx="16"/></clipPath><clipPath><rect y="8" x="8" height="32" width="32" fill="none" rx="16"/></clipPath><clipPath><rect y="507.8" x="392.57" height="32" width="32" fill="none" rx="16"/></clipPath><clipPath><rect width="32" height="32" x="392.57" y="507.8" fill="none" rx="16"/></clipPath><clipPath><path fill="#aade87" fill-opacity=".472" d="m-6 1028.36h32v32h-32z"/></clipPath><clipPath><rect width="32" height="32" x="8" y="8" fill="none" rx="16"/></clipPath><clipPath><path fill="#00f" fill-opacity=".514" d="m-7 1024.36h34v34h-34z"/></clipPath><clipPath><path fill="#00f" fill-opacity=".514" d="m-7 1024.36h34v34h-34z"/></clipPath><clipPath><path fill="#aade87" fill-opacity=".472" d="m-6 1028.36h32v32h-32z"/></clipPath><clipPath><path d="m0 706.47h1490.93v-706.47h-1490.93v706.47"/></clipPath><clipPath><rect width="32" height="32" x="392.57" y="507.8" fill="none" rx="16"/></clipPath><clipPath><path d="m22.2 686.12h1447.73v-667.19h-1447.73v667.19"/></clipPath><clipPath><rect width="32" height="32" x="392.57" y="507.8" fill="none" rx="16"/></clipPath><clipPath><rect width="32" height="32" x="8" y="8" fill="none" rx="16"/></clipPath><clipPath><rect width="32" height="32" x="392.57" y="507.8" fill="none" rx="16"/></clipPath></defs><g transform="matrix(1.125 0 0 1.125-368.12-602.53)" fill="#fff"><path d="m132.77 118.03l-27.945-27.945c6.735-9.722 10.1-20.559 10.1-32.508 0-7.767-1.508-15.195-4.523-22.283-3.01-7.089-7.088-13.199-12.221-18.332-5.133-5.133-11.242-9.207-18.33-12.221-7.09-3.01-14.518-4.522-22.285-4.522-7.767 0-15.195 1.507-22.283 4.522-7.089 3.01-13.199 7.088-18.332 12.221-5.133 5.133-9.207 11.244-12.221 18.332-3.01 7.089-4.522 14.516-4.522 22.283 0 7.767 1.507 15.193 4.522 22.283 3.01 7.088 7.088 13.197 12.221 18.33 5.133 5.134 11.244 9.207 18.332 12.222 7.089 3.02 14.516 4.522 22.283 4.522 11.951 0 22.787-3.369 32.509-10.1l27.945 27.863c1.955 2.064 4.397 3.096 7.332 3.096 2.824 0 5.27-1.032 7.332-3.096 2.064-2.063 3.096-4.508 3.096-7.332.0001-2.877-1-5.322-3.01-7.331m-49.41-34.668c-7.143 7.143-15.738 10.714-25.787 10.714-10.05 0-18.643-3.572-25.786-10.714-7.143-7.143-10.714-15.737-10.714-25.786 0-10.05 3.572-18.644 10.714-25.786 7.142-7.143 15.738-10.714 25.786-10.714 10.05 0 18.643 3.572 25.787 10.714 7.143 7.142 10.715 15.738 10.715 25.786 0 10.05-3.573 18.643-10.715 25.786" transform="matrix(.11417.00745-.00745.11417 329.93 536.91)"/><path d="m415-51h2v2h2v2h-2v2h-2v-2h-2v-2h2v-2" color="#bebebe" transform="matrix(.88889 0 0 .88889-33.756 586.71)" enable-background="new"/></g></svg>
							</div>
						</div>
					</div>
		
				<?php endforeach; ?>
		<?php endif; ?>
	</div>

<?php
get_footer();
