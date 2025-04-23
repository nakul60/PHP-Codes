require 'mail'

# Set up SMTP settings
Mail.defaults do
  delivery_method :smtp, {
    address:              'smtp.gmail.com',
    port:                 587,
    user_name:            'example_email@gmail.com',
    password:             'app_password', # Use an app-specific password
    authentication:       :login,
    enable_starttls_auto: true
  }
end

# Define email message
message = Mail.new do
  from    'sender@gmail.com'
  to      'receiver@example.com'
  subject 'Hello from Ruby!'
  body    'This is a test email sent from Ruby.'
end

# Send email
message.deliver!
