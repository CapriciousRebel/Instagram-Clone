CREATE TABLE account
(
    user_id SERIAL PRIMARY KEY,
    username VARCHAR(63) NOT NULL UNIQUE,
    name VARCHAR(63),
    profile_pic VARCHAR(1023),
    password VARCHAR(255) NOT NULL,
    email_or_phone VARCHAR(127) NOT NULL UNIQUE
);


CREATE TABLE posts
(
    post_id SERIAL PRIMARY KEY,
    user_id INT REFERENCES account(user_id),
    path VARCHAR(1023) NOT NULL,
    caption VARCHAR(255),
    created_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP(0)                                         
);


CREATE TABLE likes
(
    like_id SERIAL PRIMARY KEY,
    post_id INT REFERENCES posts(post_id),
    user_id INT REFERENCES account(user_id),
    like_uniq VARCHAR(2)
);

CREATE TABLE comments
(
    comment_id SERIAL PRIMARY KEY,
    post_id INT REFERENCES posts(post_id),
    user_id INT REFERENCES account(user_id),
    comment_uniq VARCHAR(2)
);


CREATE TABLE followers
(
    follower_id SERIAL PRIMARY KEY,
    follow VARCHAR(255) REFERENCES account(username),
    follower VARCHAR(255)
);

