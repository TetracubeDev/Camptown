<section id="alr_content1" class="alr_tab_section">
    <div class="alr_tab_inner_container">
        <form method="post" id="alr_setting_tab_form">
            <table class="form-table heading-table">
            <tbody>
                <tr valign="top">
                    <td>
                        <h3 style=""><?php _e( 'General Setting', 'woocommerce-ajax-login-register' ); ?></h3>
                    </td>
                    <td>
                        <button name="save" class="button-primary woocommerce-save-button" type="submit" value="Save changes" style="float: right;">Save</button>
                        <div class="spinner workflow_spinner" style="float:right"></div>
                        <div class="success_msg workflow_success" style="display:none;">Settings saved successfully.</div>
                        <div class="error_msg workflow_error" style="display:none;"></div>
                        <div class="error_msg invalid_license" style="display:none;"></div>
                    </td>
                </tr>
             </tbody>
            </table>
            <?php $this->get_html( $this->get_settings() ); ?>
            <?php wp_nonce_field( 'alr_setting_form_action', 'alr_setting_form_nonce_field' ); ?>
            <input type="hidden" name="action" value="alr_setting_form_update">
    	</form>	
    </div>
</section>