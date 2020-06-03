--
-- PostgreSQL database dump
--

-- Dumped from database version 12.2
-- Dumped by pg_dump version 12.2

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
-- Name: account; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.account (
    user_id integer NOT NULL,
    username character varying(63) NOT NULL,
    name character varying(63),
    profile_pic character varying(1023),
    password character varying(255) NOT NULL,
    email_or_phone character varying(127) NOT NULL
);


ALTER TABLE public.account OWNER TO postgres;

--
-- Name: account_user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.account_user_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.account_user_id_seq OWNER TO postgres;

--
-- Name: account_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.account_user_id_seq OWNED BY public.account.user_id;


--
-- Name: comments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.comments (
    comment_id integer NOT NULL,
    post_id integer,
    user_id integer,
    comment character varying(255),
    comment_uniq character varying(1023)
);


ALTER TABLE public.comments OWNER TO postgres;

--
-- Name: comments_comment_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.comments_comment_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.comments_comment_id_seq OWNER TO postgres;

--
-- Name: comments_comment_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.comments_comment_id_seq OWNED BY public.comments.comment_id;


--
-- Name: followers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.followers (
    follower_id integer NOT NULL,
    follow integer,
    follower integer,
    follow_uniq character varying(1023)
);


ALTER TABLE public.followers OWNER TO postgres;

--
-- Name: followers_follower_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.followers_follower_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.followers_follower_id_seq OWNER TO postgres;

--
-- Name: followers_follower_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.followers_follower_id_seq OWNED BY public.followers.follower_id;


--
-- Name: likes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.likes (
    like_id integer NOT NULL,
    post_id integer,
    user_id integer,
    like_uniq character varying(1023)
);


ALTER TABLE public.likes OWNER TO postgres;

--
-- Name: likes_like_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.likes_like_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.likes_like_id_seq OWNER TO postgres;

--
-- Name: likes_like_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.likes_like_id_seq OWNED BY public.likes.like_id;


--
-- Name: posts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.posts (
    post_id integer NOT NULL,
    user_id integer,
    path character varying(1023) NOT NULL,
    caption character varying(255),
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP(0)
);


ALTER TABLE public.posts OWNER TO postgres;

--
-- Name: posts_post_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.posts_post_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.posts_post_id_seq OWNER TO postgres;

--
-- Name: posts_post_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.posts_post_id_seq OWNED BY public.posts.post_id;


--
-- Name: account user_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.account ALTER COLUMN user_id SET DEFAULT nextval('public.account_user_id_seq'::regclass);


--
-- Name: comments comment_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.comments ALTER COLUMN comment_id SET DEFAULT nextval('public.comments_comment_id_seq'::regclass);


--
-- Name: followers follower_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.followers ALTER COLUMN follower_id SET DEFAULT nextval('public.followers_follower_id_seq'::regclass);


--
-- Name: likes like_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.likes ALTER COLUMN like_id SET DEFAULT nextval('public.likes_like_id_seq'::regclass);


--
-- Name: posts post_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.posts ALTER COLUMN post_id SET DEFAULT nextval('public.posts_post_id_seq'::regclass);


--
-- Data for Name: account; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.account (user_id, username, name, profile_pic, password, email_or_phone) FROM stdin;
1	Rebel	Smith	assets/uploads/profile_pics/smith.png	admin	1234567890
2	Princess_Consuela	Phoebe Buffay	assets/uploads/profile_pics/phoebe.png	phoebe	phoebe@friends
4	mommy	Rachel+Greene	assets/uploads/profile_pics/phoebe.png	rachel	878876545
5	Raquel	Rachel+Greene	assets/uploads/profile_pics/rachel.jpg	rachel	1232223232323
6	writer	Brian	assets/uploads/profile_pics/qKPEEZlv.jpg	cbd44f8b5b48a51f7dab98abcdf45d4e	xyew
7	D-Money	Dwight Schrute	assets/uploads/profile_pics/dwight.jpg	e72f4545eb68c96c754f91fc01573517	dwight@office
8	Mike	Michael Gary Scott	assets/uploads/profile_pics/micheal.jpg	e72f4545eb68c96c754f91fc01573517	micheal@office
3	pewds	Felix+Kjellburger	assets/uploads/profile_pics/pewds.jpeg	admin	123456789
9	admin	Smith	assets/uploads/profile_pics/pewds2.jpeg	admin	1234567890765
10	test99	test99	\N	1d56a580bb00ff669f38e5c1f69b497c	1234
\.


--
-- Data for Name: comments; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.comments (comment_id, post_id, user_id, comment, comment_uniq) FROM stdin;
1	15	3	Nice	153
2	15	3		153
3	12	3		123
4	12	3		123
5	12	3		123
6	15	3		153
7	15	3		153
8	14	3		143
9	14	3		143
10	13	3		133
11	13	3	comsdnsa	133
12	13	3		133
13	13	3		133
14	13	3	nice	133
15	17	3	lolz	173
16	17	3	niice	173
17	17	3	sds	173
18	17	3	ds	173
19	17	3		173
20	17	3	loast	173
21	17	3	saasdloast	173
22	16	3	cool	163
23	17	9	so many comments!	179
24	16	9	aha	169
25	15	9	pam drew that!	159
26	18	9	me in heaven	189
\.


--
-- Data for Name: followers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.followers (follower_id, follow, follower, follow_uniq) FROM stdin;
12	3	1	13
14	3	6	63
15	7	8	87
19	8	6	68
20	8	1	18
21	8	7	78
23	9	2	29
24	9	7	79
26	9	6	69
\.


--
-- Data for Name: likes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.likes (like_id, post_id, user_id, like_uniq) FROM stdin;
74	11	6	116
76	10	6	106
77	14	6	146
78	7	6	76
79	12	6	126
80	8	6	86
82	14	8	148
84	15	8	158
85	13	8	138
88	8	8	88
90	10	8	108
91	15	3	153
92	10	3	103
93	17	3	173
94	16	9	169
95	14	9	149
96	10	9	109
97	18	9	189
47	7	3	73
48	8	3	83
\.


--
-- Data for Name: posts; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.posts (post_id, user_id, path, caption, created_at) FROM stdin;
7	1	assets/uploads/posts/phone.png	nice phone	2020-03-28 14:36:00+05:30
8	1	assets/uploads/posts/facebook_logo.png	my favorite app	2020-03-28 14:36:24+05:30
10	4	assets/uploads/posts/rachel.jpg	me	2020-03-28 15:58:12+05:30
11	6	assets/uploads/posts/qKPEEZlv.jpg	the best writer!	2020-03-29 10:06:07+05:30
12	6	assets/uploads/posts/briangriffin.jpg	lolz	2020-03-29 10:28:51+05:30
13	6	assets/uploads/posts/brain-toy.png	whoops!	2020-03-29 10:29:30+05:30
14	6	assets/uploads/posts/briangriffin.jpg		2020-03-29 10:35:03+05:30
15	8	assets/uploads/posts/the office.jpg	The best Office!	2020-03-30 12:52:50+05:30
16	8	assets/uploads/posts/photo.png	motivate	2020-03-31 09:54:21+05:30
17	3	assets/uploads/posts/pewds.jpeg	haha	2020-04-06 18:23:41+05:30
18	9	assets/uploads/posts/pewds.jpeg	aaaaaaaa	2020-04-06 19:02:40+05:30
\.


--
-- Name: account_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.account_user_id_seq', 10, true);


--
-- Name: comments_comment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.comments_comment_id_seq', 26, true);


--
-- Name: followers_follower_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.followers_follower_id_seq', 26, true);


--
-- Name: likes_like_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.likes_like_id_seq', 97, true);


--
-- Name: posts_post_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.posts_post_id_seq', 18, true);


--
-- Name: account account_email_or_phone_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.account
    ADD CONSTRAINT account_email_or_phone_key UNIQUE (email_or_phone);


--
-- Name: account account_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.account
    ADD CONSTRAINT account_pkey PRIMARY KEY (user_id);


--
-- Name: account account_username_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.account
    ADD CONSTRAINT account_username_key UNIQUE (username);


--
-- Name: comments comments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.comments
    ADD CONSTRAINT comments_pkey PRIMARY KEY (comment_id);


--
-- Name: followers followers_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.followers
    ADD CONSTRAINT followers_pkey PRIMARY KEY (follower_id);


--
-- Name: likes likes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.likes
    ADD CONSTRAINT likes_pkey PRIMARY KEY (like_id);


--
-- Name: posts posts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_pkey PRIMARY KEY (post_id);


--
-- Name: comments comments_post_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.comments
    ADD CONSTRAINT comments_post_id_fkey FOREIGN KEY (post_id) REFERENCES public.posts(post_id);


--
-- Name: comments comments_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.comments
    ADD CONSTRAINT comments_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.account(user_id);


--
-- Name: followers followers_follow_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.followers
    ADD CONSTRAINT followers_follow_fkey FOREIGN KEY (follow) REFERENCES public.account(user_id);


--
-- Name: followers followers_follower_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.followers
    ADD CONSTRAINT followers_follower_fkey FOREIGN KEY (follower) REFERENCES public.account(user_id);


--
-- Name: likes likes_post_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.likes
    ADD CONSTRAINT likes_post_id_fkey FOREIGN KEY (post_id) REFERENCES public.posts(post_id);


--
-- Name: likes likes_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.likes
    ADD CONSTRAINT likes_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.account(user_id);


--
-- Name: posts posts_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.account(user_id);


--
-- PostgreSQL database dump complete
--

