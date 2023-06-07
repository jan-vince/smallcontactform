<?php

return [
  'plugin' => [
    'name' => '联系表单',
    'description' => '简单的联系表单生成器',
    'category' => '小插件',
  ],

  'permissions' => [
    'access_messages' => '访问消息列表',
    'access_settings' => '管理后端偏好设置',
    'delete_messages' => '删除存储的消息',
    'export_messages' => '导出消息',
  ],

  'navigation' => [
    'main_label' => '联系表单',
    'messages' => '消息',
  ],

  'controller' => [

    'contact_form' => [
      'name' => '联系表单',
      'description' => '将联系表单插入页面',
      'no_fields' => '请先在后端管理中添加一些表单字段（在设置>小型联系表单>字段中）...',
    ],

    'filter' => [
      'date' => 'Date range',
    ],

    'scoreboard' => [
      'records_count' => '消息数',
      'latest_record' => '最新来自',
      'new_count' => '新的',
      'new_description' => '消息',
      'read_count' => '已读',
      'all_count' => '总共',
      'all_description' => '消息',
      'settings_btn' => '表单设置',
      'mark_read' => '标记为已读',
      'mark_read_confirm' => '确定将选中的消息设为已读吗？',
      'mark_read_success' => '标记成功。',
    ],

    'preview' => [
      'record_not_found' => '未找到消息！',
    ],

  ],

  'models' => [

    'message' => [

      'columns' => [
        'id' => 'ID',
        'datetime' => '日期和时间',
        'form_data' => '表单数据',
        'name' => '姓名',
        'email' => '邮箱',
        'message' => '消息',
        'new_message' => '状态',
        'new' => '新的',
        'read' => '已读',
        'remote_ip' => '发送者IP',
        'form_alias' => '别名',
        'form_description' => '描述',
        'created_at' => '创建时间',
        'updated_at' => '更新时间',
        'url' => 'URL',
        'files' => '文件',
        'form_notes' => '备注',
      ]

    ],


  ],

  'controllers' => [

    'messages' => [

      'list_title' => '消息',
      'preview' => '预览',
      'preview_title' => '联系表单消息',
      'preview_date' => '日期:',
      'preview_content_title' => '内容:',
      'remote_ip' => '发送自 IP',
      'export' => '导出',
    ],

    'index' => [
      'unauthorized' => '未经授权的访问',
    ],

  ],

  'mail' => [

    'templates' => [

      'autoreply' => '表单自动回复消息（英语）',
      'autoreply_cs' => '表单自动回复消息（捷克语）',

      'notification' => '表单通知消息（英语）',
      'notification_cs' => '表单通知消息（捷克语）',

    ]

  ],

  'reportwidget' => [

    'partials' => [

      'messages' => [
        'label' => '联系表单-消息统计',
        'title' => '消息统计',
        'messages_all' => '全部',
        'messages_new' => '未读',
        'messages_read' => '已读',
      ],

      'new_message' => [
        'label' => '联系表单-新消息',
        'title' => '新消息',
        'link_text' => '单击以显示消息列表',
      ],

    ],

  ],

  'settings' => [

    'form' => [

      'css_class' => '表单CSS类',

      'use_placeholders' => '使用占位符',
        'use_placeholders_comment' => '占位符将显示在字段标签的位置',

        'disable_browser_validation' => '禁用浏览器验证',
        'disable_browser_validation_comment' => '不允许浏览器内置验证和弹窗。',

        'success_msg' => '表单成功消息',
        'success_msg_placeholder' => '您的数据已发送。',

        'error_msg' => '表单错误消息',
        'error_msg_placeholder' => '发送您的数据时出错！',

        'allow_ajax' => '启用AJAX',
        'allow_ajax_comment' => '允许AJAX降级为非JavaScript浏览器',

        'disable_plain_post' => '禁用明文POST方式',
        'disable_plain_post_comment' => '禁用明文POST降级（可以防止某些垃圾邮件发送者）',

        'allow_confirm_msg' => '在发送表单前进行确认',
        'allow_confirm_msg_comment' => '在发送前添加确认对话框',

        'send_confirm_msg' => '确认文本',
        'send_confirm_msg_placeholder' => '您确定吗？',

        'hide_after_success' => '成功发送后隐藏表单',
        'hide_after_success_comment' => '仅显示成功消息，而不显示表单',

        'add_assets' => '添加资源',
        'add_assets_comment' => '自动添加必要的CSS和JS资源（有关资源的详细信息，请参见README.md文件）',

        'add_css_assets' => '添加CSS资源',
        'add_css_assets_comment' => '将包括所有必要的样式',

        'add_js_assets' => '添加JavaScript资源',
        'add_js_assets_comment' => '将包括所有必要的JavaScript',

        'form_ga_event_success' => 'GA成功发送后的事件',

        'notes' => '注释',
        'notes_comment' => '您可以添加注释，以在邮件消息中显示。',

    ],

    'sections' => [
      'ga_events' => '事件'
    ],

    'ga' => [
      'ga_success_event_allow' => '成功发送后发送事件',

      'ga_success_event_gtag' => '网站使用的全局标签',
      'ga_success_event_gtag_empty_option' => '选择使用的标签',
      'ga_success_event_gtag_ga' => 'analytics.js（旧版）',
      'ga_success_event_gtag_gtag' => 'gtag.js',

    ],

    'buttons' => [
      'send_btn_text' => '发送按钮文本',
      'send_btn_text_placeholder' => '发送',

      'send_btn_css_class' => '发送按钮CSS类',
      'send_btn_css_class_placeholder' => 'btn btn-primary',

      'send_btn_wrapper_css' => '发送按钮包装器CSS类',
      'send_btn_wrapper_css_placeholder' => 'form-group',

    ],

    'redirect' => [

      'allow_redirect' => '提交后重定向',
      'allow_redirect_comment' => '成功提交后重定向到另一页',

      'redirect_url' => '重定向到的页面URL',
      'redirect_url_comment' => '输入页面URL（例如/contact/thank-you）',
      'redirect_url_placeholder' => '/contact/thank-you',

      'redirect_url_external' => '外部URL',
      'redirect_url_external_comment' => '这是外部URL路径（例如http://www.domain.com）',

    ],

    'form_fields' => [
      'prompt' => '添加新的表单字段',

      'name' => '字段名称',
      'name_comment' => '小写，不带特殊字符（例如name，email，home_address，...）',

      'type' => '字段类型',

      'label' => '标签',
      'label_placeholder' => '全名',

      'field_styling' => '自定义CSS类',
      'field_styling_comment' => '更改默认的Bootstrap样式',

      'autofocus' => '自动聚焦字段',
      'autofocus_comment' => '自动对焦此表单字段',

      'wrapper_css' => '包装器CSS类',
      'wrapper_css_placeholder' => 'form-group',

      'field_css' => '字段CSS类',
      'field_css_placeholder' => 'form-control',

      'label_css' => '标签CSS类',
      'label_css_placeholder' => '',

      'field_validation' => '字段验证',
      'field_validation_comment' => '添加字段验证规则',

      'validation' => '验证',
      'validation_prompt' => '添加验证',

      'validation_type' => '验证规则',

      'validation_error' => '验证错误消息',
      'validation_error_placeholder' => '请输入有效的数据。',
      'validation_error_comment' => '验证失败时使用的错误消息',

      'validation_custom_type' => '验证规则名称',
      'validation_custom_type_comment' => '输入验证器规则名称（例如regex，boolean，...）。<br>请参见<a href="https://octobercms.com/docs/services/validation#available-validation-rules" target="_blank">验证规则</a>。',
      'validation_custom_type_placeholder' => '正则表达式',

      'validation_custom_pattern' => '验证规则模式',
      'validation_custom_pattern_comment' => '留空或输入自定义规则模式（这是验证器规则的右侧部分，冒号后面的内容-例如[abc]用于regex）。',
      'validation_custom_pattern_placeholder' => "/^[0-9]+$/",

      'custom' => '自定义字段',
      'custom_description' => '带验证选项的自定义字段',

      'add_values_prompt' => '添加值',
      'field_value_id' => '字段值ID',
      'field_value_content' => '字段值内容',

      'hit_type' => '点击类型',
      'event_category' => '事件类别',
      'event_action' => '事件操作',
      'event_label' => '事件标签',

      'custom_code' => '自定义代码',
      'custom_code_comment' => '此代码将覆盖内置字段代码。谨慎使用！',
      'custom_code_twig' => '允许Twig',
      'custom_code_twig_comment' => '如果选中，将解析Twig标记。',
      
      'custom_content' => '自定义内容',
      'custom_content_comment' => '此内容将添加到字段中。',
    ],

    'form_field_types' => [
      'text' => '文本',
      'email' => '电子邮件',
      'textarea' => '文本区',
      'checkbox' => '复选框',
      'dropdown' => '下拉菜单',
      'file' => '文件',
      'custom_code' => '自定义代码',
      'custom_content' => '自定义内容',
    ],

    'form_field_validation' => [
      'select' => '--- 选择验证 ---',
      'required' => '必填项',
      'email' => '电子邮件',
      'numeric' => '数字',
      'custom' => '自定义规则',
    ],

    'email' => [
      'address_from' => '发件地址',
      'address_from_placeholder' => 'john.doe@domain.com',

      'address_from_name' => '发件人姓名',
      'address_from_name_placeholder' => 'John Doe',

      'address_replyto' => '回复地址',
      'address_replyto_comment' => '回复邮件将发送到此地址。',

      'subject' => '电子邮件主题',
      'subject_comment' => '仅在要定义设置>邮件模板之外的主题时设置。',

      'template' => '电子邮件模板',
      'template_comment' => '在“设置”>“电子邮件模板”中创建的电子邮件模板代码。留空以使用默认模板：janvince.smallcontactform :: mail.autoreply。',

      'allow_email_queue' => '邮件发送队列',
      'allow_email_queue_comment' => '将电子邮件添加到队列中而不是立即发送。您必须先配置您的OctoberCMS队列！',

      'allow_notifications' => '允许通知',
      'allow_notifications_comment' => '表单发送后发送通知',

      'notification_address_to' => '通知邮件接收者',
      'notification_address_to_comment' => '电子邮件地址或逗号分隔的地址列表',
      'notification_address_to_placeholder' => 'notifications@domain.com',

      'notification_address_from_form' => '强制通知发件人地址（并非所有电子邮件系统都支持！）',
      'notification_address_from_form_comment' => '将通知From地址设置为在联系表单中输入的电子邮件（必须在列映射中设置该字段）。',

      'allow_autoreply' => '允许自动回复',
      'allow_autoreply_comment' => '向作者发送表单内容副本',

      'autoreply_name_field' => '名称表单字段',
      'autoreply_name_field_empty_option' => '-- 选择 --',
      'autoreply_name_field_comment' => '必须是Text类型。<br><em>如果您看不到您的字段，请保存并刷新此页面。</em>',

      'autoreply_email_field' => '电子邮件地址表单字段',
      'autoreply_email_field_empty_option' => '-- 选择 --',
      'autoreply_email_field_comment' => '必须是电子邮件类型。<br><em>如果您看不到您的字段，请保存并刷新此页面。</em>',

      'autoreply_message_field' => '消息表单字段',
      'autoreply_message_field_empty_option' => '-- 选择 --',
      'autoreply_message_field_comment' => '必须是Textarea或Text类型。<br><em>如果您看不到您的字段，请保存并刷新此页面。</em>',

      'notification_template' => '通知电子邮件模板',
      'notification_template_comment' => '在设置 > 邮件模板 中创建的电子邮件模板代码。留空以使用默认模板：janvince.smallcontactform :: mail.autoreply。',

    ],

    'antispam' => [
      'add_antispam' => '添加被动反垃圾邮件保护',
      'add_antispam_comment' => '添加简单但有效的被动反垃圾邮件控件（更多信息请参见README.md文件）',

      'antispam_delay' => '反垃圾邮件延迟（秒）',
      'antispam_delay_comment' => '过快的表单发送保护延迟（通常由机器人）',
      'antispam_delay_placeholder' => '3',

      'antispam_label' => '反垃圾邮件字段标签',
      'antispam_label_comment' => '标签对于未启用JavaScript的浏览器可见',
      'antispam_label_placeholder' => '请清除此字段',

      'antispam_error_msg' => '错误信息',
      'antispam_error_msg_comment' => '触发反垃圾邮件保护时向用户显示的消息',
      'antispam_error_msg_placeholder' => '请清空此字段！',

      'antispam_delay_error_msg' => '延迟错误消息',
      'antispam_delay_error_msg_comment' => '在表单发送太快时向用户显示的消息',
      'antispam_delay_error_msg_placeholder' => '表单发送太快！ 请稍等几秒钟再试！',

      'add_google_recaptcha' => '添加Google reCaptcha',
      'add_google_recaptcha_comment' => '在联系表单中添加reCaptcha（更多信息请参见README.md文件）。<br>您可以在<a href="https://www.google.com/recaptcha/admin#list" target="_blank">Google reCaptch上获得API密钥a site</a>.',

      'google_recaptcha_version' => 'Google reCaptcha版本',
      'google_recaptcha_version_comment' => '选择reCaptcha小部件的版本。<br>有关更多信息，请访问<a href="https://developers.google.com/recaptcha/docs/versions" target="_blank">Google reCaptcha网站</a>。',
      
      'google_recaptcha_versions' => [
        'v2checkbox' => 'reCaptcha V2复选框',
        'v2invisible' => 'reCaptcha V2不可见',
      ],

      'google_recaptcha_site_key' => '网站密钥',
      'google_recaptcha_site_key_comment' => '放置您的网站密钥',

      'google_recaptcha_secret_key' => '秘密密钥',
      'google_recaptcha_secret_key_comment' => '放置您的秘密密钥',

      'google_recaptcha_wrapper_css' => 'reCaptcha盒子包装器CSS类',
      'google_recaptcha_wrapper_css_comment' => 'reCaptcha框周围包装框的CSS类',
      'google_recaptcha_wrapper_css_placeholder' => 'form-group',

      'google_recaptcha_error_msg' => '错误信息',
      'google_recaptcha_error_msg_comment' => '未验证reCAPTCHA时向用户显示的消息。',
      'google_recaptcha_error_msg_placeholder' => '谷歌reCAPTCHA验证错误！',

      'google_recaptcha_scripts_allow' => '自动添加必要的JS脚本',
      'google_recaptcha_scripts_allow_comment' => '这将在您的网站上添加JS脚本的链接。',

      'google_recaptcha_locale_allow' => '允许语言环境检测',
      'google_recaptcha_locale_allow_comment' => '这将在reCAPTCHA脚本中添加当前网页区域设置，以使其翻译。',

      'add_ip_protection' => '检查发件人的IP',
      'add_ip_protection_comment' => '不允许来自一个IP地址的太多表单提交',

      'add_ip_protection_count' => '单日最大表单提交次数',
      'add_ip_protection_count_comment' => '单日允许从一个IP地址提交的次数',
      'add_ip_protection_count_placeholder' => '3',

      'add_ip_protection_error_get_ip' => '我们无法确定您的IP地址！',

      'add_ip_protection_error_too_many_submits' => '太多提交错误消息',
      'add_ip_protection_error_too_many_submits_comment' => '向用户显示的错误消息',
      'add_ip_protection_error_too_many_submits_placeholder' => '今天来自一个地址发送了太多表单！',

      'disabled_extensions' => '禁用的扩展',
      'disabled_extensions_comment' => '隐私选项卡上设置禁用了这些扩展',

    ],

    'mapping' => [

      'hint' => [
          'title' => '为什么需要字段映射？',
          'content' => '
          <p>您可以使用自己的字段名称和类型构建自定义表单。</p>
          <p>系统将所有表单数据写入数据库，但为了快速查看，名称、电子邮件和消息列在“消息列表”中单独显示。</p>
          <p>因此，您必须通过映射到您的表单字段来帮助系统识别这些列。</p>
          <p><em>这些映射也用于自动回复电子邮件，至少需要重要的电子邮件字段映射。</em></p>
          ',
        ],

        'warning' => [
          'title' => '无法选择您的表单字段？',
          'content' => '
          <p>如果您看不到您的表单字段，请单击页面底部的保存按钮，然后重新加载页面（F5或Ctr + R / Cmd + R）。</p>
          ',
        ],

    ],

    'privacy' => [
      'disable_messages_saving' => '禁用消息保存',
      'disable_messages_saving_comment' => '勾选后，将不会在“消息列表”中保存任何数据。<br><strong>这也将禁用IP保护！</strong>',
      'disable_messages_saving_comment_section' => '<div class="callout fade in callout-danger no-subheader"><div class="header"><i class="icon-warning"></i><h3>请务必允许通知电子邮件，否则您将无法获得发送表单的数据！</h3></div></div>',
    ],

    'tabs' => [
      'form' => '表单',
      'buttons' => '发送按钮',
      'form_fields' => '字段',
      'mapping' => '列映射',
      'email' => '电子邮件',
      'antispam' => '反垃圾邮件',
      'privacy' => '隐私',
      'ga' => 'Google Analytics',
    ],

  ],

  'components' => [

      'groups' => [

          'hacks' => '黑客',
          'override_form' => '覆盖表单设置',
          'override_notifications' => '覆盖通知设置',
          'override_autoreply' => '覆盖自动回复设置',
          'override' => '覆盖表单设置',
          'override_redirect' => '覆盖重定向设置',
          'override_ga' => '覆盖 Google Analytics 设置',
          'override_notes' => '覆盖笔记',
      ],

      'properties' => [

        'form_description' => '表单说明',
        'form_description_comment' => '您可以添加可选的表单说明，它将与发送到消息列表中的其他数据一起保存。您也可以在这里使用{{: slug}}。',

        'disable_fields' => '禁用字段',
        'disable_fields_comment' => '这将禁用列出的字段。按管道符（例如name | message | phone）添加字段名称。',

        'send_btn_label' => '发送按钮标签',
        'send_btn_label_comment' => '覆盖发送按钮标签',

        'form_success_msg' => '成功消息',
        'form_success_msg_comment' => '覆盖成功发送后显示的成功消息',

        'form_error_msg' => '错误消息',
        'form_error_msg_comment' => '覆盖未成功发送后显示的错误消息',

        'disable_notifications' => '禁用通知',
        'disable_notifications_comment' => '这将禁用通知电子邮件（覆盖表单设置）',

        'notification_address_to' => '地址 TO',
        'notification_address_to_comment' => '这将覆盖通知电子邮件发送到的电子邮件地址（如果在表单设置中启用的话）',

        'notification_address_from' => 'FROM地址',
        'notification_address_from_comment' => '这将覆盖通知电子邮件发送自何处的电子邮件地址',

        'notification_address_from_name' => 'FROM地址名称',
        'notification_address_from_name_comment' => '这将覆盖通知电子邮件发送自何处的电子邮件地址的名称',

        'notification_template' => '通知模板',
        'notification_template_comment' => '这将覆盖通知电子邮件模板（例如janvince.smallcontactform :: mail.notification）',

        'notification_subject' => '通知主题',
        'notification_template_comment' => '覆盖电子邮件主题',

        'disable_autoreply' => '禁用通知',
        'disable_autoreply_comment' => '这将禁用通知电子邮件（覆盖表单设置）',

        'autoreply_address_from' => 'FROM地址',
        'autoreply_address_from_comment' => '这将覆盖自动回复邮件中的电子邮件地址（如果在表单设置中启用的话）',

        'autoreply_address_from_name' => 'FROM地址名称',
        'autoreply_address_from_name_comment' => '这将覆盖自动回复电子邮件中的电子邮件地址名称（如果在表单设置中启用的话）',

        'autoreply_address_replyto' => 'REPLY TO地址',
        'autoreply_address_replyto_comment' => '这将覆盖自动回复电子邮件中的“回复至”电子邮件地址（如果在表单设置中启用的话）',

        'autoreply_template' => '自动回复模板',
        'autoreply_template_comment' => '这将覆盖自动回复电子邮件模板（例如janvince.smallcontactform :: mail.autoreply）',

        'autoreply_subject' => '自动回复电子邮件主题',
        'autoreply_template_comment' => '覆盖电子邮件主题',

      ]

  ],

];
