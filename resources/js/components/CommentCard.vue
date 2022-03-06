<template>
  <div>
      <div class="flex comment text-white mt-4">
          <div class="max-w-xs  w-full flex flex-col justify-evenly px-4 border-r-4 border-dotted border-gray-400">
            <strong class="self-center">{{comment.user.name}}</strong>
          </div>
          <div class="p-4 flex flex-col justify-between">
              <p class="font-bold max-w-md break-words">{{comment.text}}</p>
              <div>
                <small>Published at: {{comment.created_at | moment("from","now")}}</small>
              </div>
          </div>
      </div>
  </div>
</template>
<script>

export default {
    name: 'CommentCard',
    props: {
       comment: Object
    },
}
</script>