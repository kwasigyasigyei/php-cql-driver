<?php
/**
 * Represents a pool of connections to a cluster (?)
 *
 * We need to think about how this works for PHP. The Python implementation
 * has an available pool of connections (where you actually have to specify
 * the hostname/port). When you execute a query you "borrow" a connection and
 * then return it when you're finished. Within PHP I guess this would be
 * largely pointless, since the queries are going to executed sequentially
 * so you just end up borrowing and returning the same connection over and over.
 *
 * I've written our own "client" which stores failure rates in a caching system
 * (APC or Memcache) and auto-discovers the ring of available nodes from a
 * configured list of seed nodes. This is easy to use, which is nice, and means
 * you can scale down or up the cluster without needing to deploy code (it will
 * learn which nodes have left/joined).
 *
 * Discuss!
 */
class ConnectionPool
{
}