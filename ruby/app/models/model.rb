class User < ApplicationRecord
  attribute :confirmed_at, :datetime, default: Time.now

  after_commit :schedule_welcome_email, on: :create

  def schedule_welcome_email
    WelcomeEmailJob.perform_later(id)
  end
end

class Comment < ApplicationRecord
  after_create_commit  :broadcast
  after_destroy_commit :broadcast

  def broadcast
    BroadcastJob.perform_later(id)
  end
end

class Person < ApplicationRecord
  after_commit :after_commit_callback
  before_validation :before_validation_callback

  validates :name, presence: true
end

class Post < ApplicationRecord
  belongs_to :blog, required: false
end
