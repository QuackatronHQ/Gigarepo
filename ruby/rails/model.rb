class User < ApplicationRecord
  attribute :confirmed_at, :datetime, default: Time.now
end
