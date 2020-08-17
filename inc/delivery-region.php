<?php
$taxname = 'city';

// Поля при добавлении элемента таксономии
add_action("{$taxname}_add_form_fields", 'add_new_custom_fields');
// Поля при редактировании элемента таксономии
add_action("{$taxname}_edit_form_fields", 'edit_new_custom_fields');
// Сохранение при добавлении элемента таксономии
add_action("create_{$taxname}", 'save_custom_taxonomy_meta');
// Сохранение при редактировании элемента таксономии
add_action("edited_{$taxname}", 'save_custom_taxonomy_meta');

function edit_new_custom_fields( $term ) {
	?>
		<tr class="form-field">
			<th scope="row" valign="top"><label>Код города доставки</label></th>
			<td>
				<input type="text" name="extra[city_code]" value="<?php echo esc_attr( get_term_meta( $term->term_id, 'city_code', 1 ) ) ?>"><br />
				<span class="description">Добавьте на латинице наименование зоны</span>
			</td>
		</tr>
		<tr class="form-field">
			<th scope="row" valign="top"><label>Почта менеджера доставки</label></th>
			<td>
				<input type="text" name="extra[order_email]" value="<?php echo esc_attr( get_term_meta( $term->term_id, 'order_email', 1 ) ) ?>"><br />
				<span class="description">Почта, куда будут отправляться заказы с доставкой в этом городе</span>
			</td>
		</tr>
	<?php
}

function add_new_custom_fields( $taxonomy_slug ){
	?>
	<div class="form-field">
		<label for="tag-city_code">Код города доставки</label>
		<input name="extra[city_code]" id="tag-city_code" type="text" value="" />
		<p>Добавьте на латинице наименование зоны</p>
	</div>
	<div class="form-field">
		<label for="tag-description">Почта менеджера доставки</label>
		<input name="extra[order_email]" id="tag-order_email" type="text" value="" />
		<p>Почта, куда будут отправляться заказы с доставкой в этом городе</p>
	</div>
	<?php
}

function save_custom_taxonomy_meta( $term_id ) {
	if ( ! isset($_POST['extra']) ) return;
	if ( ! current_user_can('edit_term', $term_id) ) return;
	if (
		! wp_verify_nonce( $_POST['_wpnonce'], "update-tag_$term_id" ) && // wp_nonce_field( 'update-tag_' . $tag_ID );
		! wp_verify_nonce( $_POST['_wpnonce_add-tag'], "add-tag" ) // wp_nonce_field('add-tag', '_wpnonce_add-tag');
	) return;

	// Все ОК! Теперь, нужно сохранить/удалить данные
	$extra = wp_unslash($_POST['extra']);

	foreach( $extra as $key => $val ){
		// проверка ключа
		$_key = sanitize_key( $key );
		if( $_key !== $key ) wp_die( 'bad key'. esc_html($key) );

		// очистка
		if( $_key === 'tag_posts_shortcode_links' )
			$val = sanitize_textarea_field( strip_tags($val) );
		else
			$val = sanitize_text_field( $val );

		// сохранение
		if( ! $val )
			delete_term_meta( $term_id, $_key );
		else
			update_term_meta( $term_id, $_key, $val );
	}

	return $term_id;
}