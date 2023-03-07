class User < ApplicationRecord
  attribute :confirmed_at, :datetime, default: Time.now
end

class Person < ApplicationRecord
  after_commit :after_commit_callback
  before_validation :before_validation_callback

  validates :name, presence: true
end
