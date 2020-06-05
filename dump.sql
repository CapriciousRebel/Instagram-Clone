--
-- PostgreSQL database dump
--

-- Dumped from database version 12.3 (Debian 12.3-1.pgdg100+1)
-- Dumped by pg_dump version 12.3 (Debian 12.3-1.pgdg100+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: account; Type: TABLE; Schema: public; Owner: root
--

CREATE TABLE public.account (
    user_id integer NOT NULL,
    username character varying(63) NOT NULL,
    name character varying(63),
    profile_pic character varying(1023),
    password character varying(255) NOT NULL,
    email_or_phone character varying(127) NOT NULL
);


ALTER TABLE public.account OWNER TO root;

--
-- Name: account_user_id_seq; Type: SEQUENCE; Schema: public; Owner: root
--

CREATE SEQUENCE public.account_user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.account_user_id_seq OWNER TO root;

--
-- Name: account_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: root
--

ALTER SEQUENCE public.account_user_id_seq OWNED BY public.account.user_id;


--
-- Name: comments; Type: TABLE; Schema: public; Owner: root
--

CREATE TABLE public.comments (
    comment_id integer NOT NULL,
    post_id integer,
    user_id integer,
    comment character varying(255),
    comment_uniq character varying(1023)
);


ALTER TABLE public.comments OWNER TO root;

--
-- Name: comments_comment_id_seq; Type: SEQUENCE; Schema: public; Owner: root
--

CREATE SEQUENCE public.comments_comment_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.comments_comment_id_seq OWNER TO root;

--
-- Name: comments_comment_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: root
--

ALTER SEQUENCE public.comments_comment_id_seq OWNED BY public.comments.comment_id;


--
-- Name: followers; Type: TABLE; Schema: public; Owner: root
--

CREATE TABLE public.followers (
    follower_id integer NOT NULL,
    follow integer,
    follower integer,
    follow_uniq character varying(1023)
);


ALTER TABLE public.followers OWNER TO root;

--
-- Name: followers_follower_id_seq; Type: SEQUENCE; Schema: public; Owner: root
--

CREATE SEQUENCE public.followers_follower_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.followers_follower_id_seq OWNER TO root;

--
-- Name: followers_follower_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: root
--

ALTER SEQUENCE public.followers_follower_id_seq OWNED BY public.followers.follower_id;


--
-- Name: likes; Type: TABLE; Schema: public; Owner: root
--

CREATE TABLE public.likes (
    like_id integer NOT NULL,
    post_id integer,
    user_id integer,
    like_uniq character varying(1023)
);


ALTER TABLE public.likes OWNER TO root;

--
-- Name: likes_like_id_seq; Type: SEQUENCE; Schema: public; Owner: root
--

CREATE SEQUENCE public.likes_like_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.likes_like_id_seq OWNER TO root;

--
-- Name: likes_like_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: root
--

ALTER SEQUENCE public.likes_like_id_seq OWNED BY public.likes.like_id;


--
-- Name: posts; Type: TABLE; Schema: public; Owner: root
--

CREATE TABLE public.posts (
    post_id integer NOT NULL,
    user_id integer,
    path character varying(1023) NOT NULL,
    caption character varying(255),
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP(0)
);


ALTER TABLE public.posts OWNER TO root;

--
-- Name: posts_post_id_seq; Type: SEQUENCE; Schema: public; Owner: root
--

CREATE SEQUENCE public.posts_post_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.posts_post_id_seq OWNER TO root;

--
-- Name: posts_post_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: root
--

ALTER SEQUENCE public.posts_post_id_seq OWNED BY public.posts.post_id;


--
-- Name: account user_id; Type: DEFAULT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.account ALTER COLUMN user_id SET DEFAULT nextval('public.account_user_id_seq'::regclass);


--
-- Name: comments comment_id; Type: DEFAULT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.comments ALTER COLUMN comment_id SET DEFAULT nextval('public.comments_comment_id_seq'::regclass);


--
-- Name: followers follower_id; Type: DEFAULT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.followers ALTER COLUMN follower_id SET DEFAULT nextval('public.followers_follower_id_seq'::regclass);


--
-- Name: likes like_id; Type: DEFAULT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.likes ALTER COLUMN like_id SET DEFAULT nextval('public.likes_like_id_seq'::regclass);


--
-- Name: posts post_id; Type: DEFAULT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.posts ALTER COLUMN post_id SET DEFAULT nextval('public.posts_post_id_seq'::regclass);


--
-- Data for Name: account; Type: TABLE DATA; Schema: public; Owner: root
--

COPY public.account (user_id, username, name, profile_pic, password, email_or_phone) FROM stdin;
\.


--
-- Data for Name: comments; Type: TABLE DATA; Schema: public; Owner: root
--

COPY public.comments (comment_id, post_id, user_id, comment, comment_uniq) FROM stdin;
\.


--
-- Data for Name: followers; Type: TABLE DATA; Schema: public; Owner: root
--

COPY public.followers (follower_id, follow, follower, follow_uniq) FROM stdin;
\.


--
-- Data for Name: likes; Type: TABLE DATA; Schema: public; Owner: root
--

COPY public.likes (like_id, post_id, user_id, like_uniq) FROM stdin;
\.


--
-- Data for Name: posts; Type: TABLE DATA; Schema: public; Owner: root
--

COPY public.posts (post_id, user_id, path, caption, created_at) FROM stdin;
\.


--
-- Name: account_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: root
--

SELECT pg_catalog.setval('public.account_user_id_seq', 1, false);


--
-- Name: comments_comment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: root
--

SELECT pg_catalog.setval('public.comments_comment_id_seq', 1, false);


--
-- Name: followers_follower_id_seq; Type: SEQUENCE SET; Schema: public; Owner: root
--

SELECT pg_catalog.setval('public.followers_follower_id_seq', 1, false);


--
-- Name: likes_like_id_seq; Type: SEQUENCE SET; Schema: public; Owner: root
--

SELECT pg_catalog.setval('public.likes_like_id_seq', 1, false);


--
-- Name: posts_post_id_seq; Type: SEQUENCE SET; Schema: public; Owner: root
--

SELECT pg_catalog.setval('public.posts_post_id_seq', 1, false);


--
-- Name: account account_email_or_phone_key; Type: CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.account
    ADD CONSTRAINT account_email_or_phone_key UNIQUE (email_or_phone);


--
-- Name: account account_pkey; Type: CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.account
    ADD CONSTRAINT account_pkey PRIMARY KEY (user_id);


--
-- Name: account account_username_key; Type: CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.account
    ADD CONSTRAINT account_username_key UNIQUE (username);


--
-- Name: comments comments_pkey; Type: CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.comments
    ADD CONSTRAINT comments_pkey PRIMARY KEY (comment_id);


--
-- Name: followers followers_pkey; Type: CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.followers
    ADD CONSTRAINT followers_pkey PRIMARY KEY (follower_id);


--
-- Name: likes likes_pkey; Type: CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.likes
    ADD CONSTRAINT likes_pkey PRIMARY KEY (like_id);


--
-- Name: posts posts_pkey; Type: CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_pkey PRIMARY KEY (post_id);


--
-- Name: comments comments_post_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.comments
    ADD CONSTRAINT comments_post_id_fkey FOREIGN KEY (post_id) REFERENCES public.posts(post_id);


--
-- Name: comments comments_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.comments
    ADD CONSTRAINT comments_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.account(user_id);


--
-- Name: followers followers_follow_fkey; Type: FK CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.followers
    ADD CONSTRAINT followers_follow_fkey FOREIGN KEY (follow) REFERENCES public.account(user_id);


--
-- Name: followers followers_follower_fkey; Type: FK CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.followers
    ADD CONSTRAINT followers_follower_fkey FOREIGN KEY (follower) REFERENCES public.account(user_id);


--
-- Name: likes likes_post_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.likes
    ADD CONSTRAINT likes_post_id_fkey FOREIGN KEY (post_id) REFERENCES public.posts(post_id);


--
-- Name: likes likes_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.likes
    ADD CONSTRAINT likes_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.account(user_id);


--
-- Name: posts posts_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.account(user_id);


--
-- PostgreSQL database dump complete
--

